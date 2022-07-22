<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Common\Search;

use Depositphotos\SDK\Resource\Common\Search\Request\GetChangedItemsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetMediaDataRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetRelatedRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetSearchColorsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetTagCloudRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\SearchHintsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\SearchRequest;
use Depositphotos\SDK\Resource\Common\Search\Response\Common\Item;
use Depositphotos\SDK\Resource\Common\Search\Response\Common\Size;
use Depositphotos\SDK\Resource\Common\Search\Response\GetMediaData\Related;
use Depositphotos\SDK\Resource\Common\Search\SearchResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class SearchResourceTest extends BaseTestCase
{
    use ResourceTrait;

    private const DATE_FORMAT = 'M.d, Y H:i:s';

    public function testSearch(): void
    {
        $this->loadFixtures('commands.common.search.search');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->search(new SearchRequest(
            $this->getFixture('request.dp_search_query'),
            $this->getFixture('request.dp_search_limit'),
            $this->getFixture('request.dp_search_offset')
        ));

        foreach ($result->getItems() as $key => $item) {
            $fixture = $this->getFixture('response.result')[$key];

            $this->assertItem($fixture, $item);
        }
    }

    public function testGetChangedItems(): void
    {
        $this->loadFixtures('commands.common.search.getChangedItems');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->getChangedItems(new GetChangedItemsRequest(
            new \DateTime($this->getFixture('request.datetime_from')),
            new \DateTime($this->getFixture('request.datetime_to')),
            $this->getFixture('request.dp_search_limit'),
            $this->getFixture('request.dp_search_offset')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());
        $this->assertEquals($this->getFixture('response.deleted'), $result->getDeleted());

        foreach ($result->getItems() as $key => $item) {
            $this->assertItem($this->getFixture('response.result')[$key], $item);

            foreach ($item->getSizes() as $size) {
                $this->assertSize($this->getFixture('response.result')[$key]['sizes'][$size->getName()], $size);
            }
        }
    }

    public function testGetRelated(): void
    {
        $this->loadFixtures('commands.common.search.getRelated');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->getRelated(new GetRelatedRequest(
            $this->getFixture('request.dp_search_item_id'),
            $this->getFixture('request.dp_related_type'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getItems() as $key => $item) {
            $this->assertItem($this->getFixture('response.items')[$key], $item);
        }
    }

    public function testGetSearchColors(): void
    {
        $this->loadFixtures('commands.common.search.getSearchColors');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->getSearchColors(new GetSearchColorsRequest());

        foreach ($result->getColors() as $key => $color) {
            $fixture = $this->getFixture('response.result')[$key];

            $this->assertEquals($fixture['id'], $color->getId());
            $this->assertEquals($fixture['hex'], $color->getHex());
        }
    }

    public function testSearchHint(): void
    {
        $this->loadFixtures('commands.common.search.searchHint');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->searchHints(new SearchHintsRequest(
            $this->getFixture('request.dp_search_prefix'),
            $this->getFixture('request.dp_language')
        ));

        $this->assertEquals($this->getFixture('response.hints'), $result->getHints());
        $this->assertEquals($this->getFixture('response.prefix'), $result->getPrefix());
    }

    public function testGetTagCloud(): void
    {
        $this->loadFixtures('commands.common.search.getTagCloud');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->getTagCloud(new GetTagCloudRequest($this->getFixture('request.dp_type')));

        foreach ($result->getTags() as $key => $tag) {
            $fixture = $this->getFixture('response.result')[$key];

            $this->assertEquals($fixture['name']['id'], $tag->getId());
            $this->assertEquals($fixture['name']['lang'], $tag->getLang());
            $this->assertEquals($fixture['name']['phrase'], $tag->getPhrase());
            $this->assertEquals($fixture['name']['type'], $tag->getType());
            $this->assertEquals($fixture['rate'], $tag->getRate());

            if (isset($fixture['name']['date_from'])) {
                $this->assertEquals($fixture['name']['date_from'], $tag->getFrom()->format('Y-m-d H:i:s'));
            }

            if (isset($fixture['name']['date_to'])) {
                $this->assertEquals($fixture['name']['date_to'], $tag->getTo()->format('Y-m-d H:i:s'));
            }
        }
    }

    public function testGetMediaData(): void
    {
        $this->loadFixtures('commands.common.search.getMediaData');

        $resource = new SearchResource($this->createHttpClient());
        $result = $resource->getMediaData(new GetMediaDataRequest(
            $this->getFixture('request.dp_media_id'),
            $this->getFixture('request.dp_full_similar'),
            $this->getFixture('request.dp_translate_items'),
            $this->getFixture('request.dp_lang'),
            $this->getFixture('request.dp_datetime_format'),
            $this->getFixture('request.dp_country_excluded')

        ));

        $this->assertItem($this->getFixture('response'), $result);

        foreach ($result->getSizes() as $size) {
            $this->assertSize($this->getFixture('response.sizes')[$size->getName()], $size);
        }

        foreach ($result->getSimilar() as $related) {
            $this->assertRelated($this->getFixture('response.similar')[$related->getId()], $related);
        }

        foreach ($result->getSeries() as $related) {
            $this->assertRelated($this->getFixture('response.series')[$related->getId()], $related);
        }
    }
    
    private function assertItem(array $expected, Item $item): void
    {
        $this->assertEquals($expected['id'], $item->getId());
        $this->assertEquals($expected['title'], $item->getTitle());
        $this->assertEquals($expected['description'], $item->getDescription());
        $this->assertEquals($expected['width'], $item->getWidth());
        $this->assertEquals($expected['height'], $item->getHeight());
        $this->assertEquals($expected['mp'], $item->getMp());
        $this->assertEquals($expected['username'], $item->getUsername());
        $this->assertEquals($expected['status'], $item->getStatus());
        $this->assertEquals($expected['views'], $item->getViews());
        $this->assertEquals($expected['downloads'], $item->getDownloads());
        $this->assertEquals($expected['level'], $item->getLevel());
        $this->assertEquals($expected['userid'], $item->getUserId());
        $this->assertEquals($expected['published'], $item->getPublished()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['updated'], $item->getUpdated()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['iseditorial'], $item->isEditorial());
        $this->assertEquals($expected['type'], $item->getType());
        $this->assertEquals($expected['thumbnail'], $item->getThumbnail());
        $this->assertEquals($expected['medium_thumbnail'], $item->getMediumThumbnail());
        $this->assertEquals($expected['large_thumb'], $item->getLargeThumbnail());
        $this->assertEquals($expected['huge_thumb'], $item->getHugeThumbnail());
        $this->assertEquals($expected['url'], $item->getUrl());
        $this->assertEquals($expected['url2'], $item->getUrl2());
        $this->assertEquals($expected['url_big'], $item->getBigThumbnail());
        $this->assertEquals($expected['url_max_qa'], $item->getMaxQaUrl());
        $this->assertEquals($expected['itemurl'], $item->getItemUrl());
        $this->assertEquals($expected['isextended'], $item->isExtended());
        $this->assertEquals($expected['isexclusive'], $item->isExclusive());
        $this->assertEquals($expected['nudity'], $item->isNudity());
        $this->assertEquals($expected['isFreeItem'], $item->isFree());
        $this->assertEquals($expected['blocked'], $item->isBlocked());
        $this->assertEquals($expected['upload_timestamp'], $item->getUploaded()->getTimestamp());
        $this->assertEquals($expected['original_filesize'], $item->getOriginalFilesize());
        $this->assertEquals($expected['original_extension'], $item->getOriginalExtension());
        $this->assertEquals($expected['royalty_model'], $item->getRoyaltyModel());

        if (isset($expected['model_release_ids'])) {
            $this->assertEquals($expected['model_release_ids'], $item->getModelReleases());
        }
    }

    private function assertSize(array $expected, Size $size): void
    {
        $this->assertEquals($expected['width'], $size->getWidth());
        $this->assertEquals($expected['height'], $size->getHeight());
        $this->assertEquals($expected['credits'], $size->getCredits());
        $this->assertEquals($expected['subscription'], $size->getSubscription());
        $this->assertEquals($expected['imagepack'], $size->getImagePack());
        $this->assertEquals($expected['ondemand'], $size->getOnDemand());

        if (isset($expected['mp'])) {
            $this->assertEquals($expected['mp'], $size->getMp());
        }
    }

    private function assertRelated(array $expected, Related $related): void
    {
        $this->assertEquals($expected['id'], $related->getId());
        $this->assertEquals($expected['thumbnail'], $related->getThumbnail());
        $this->assertEquals($expected['large_thumb'], $related->getLargeThumbnail());
        $this->assertEquals($expected['huge_thumb'], $related->getHugeThumbnail());
        $this->assertEquals($expected['title'], $related->getTitle());
        $this->assertEquals($expected['description'], $related->getDescription());
        $this->assertEquals($expected['thumb_neutral_wm'], $related->getNeutralWmThumbnail());
        $this->assertEquals($expected['url_max_qa'], $related->getMaxQaUrl());
        $this->assertEquals($expected['height'], $related->getHeight());
        $this->assertEquals($expected['width'], $related->getWidth());
        $this->assertEquals($expected['itemurl'], $related->getItemUrl());
        $this->assertEquals($expected['original_title'], $related->getOriginalTitle());
        $this->assertEquals($expected['original_description'], $related->getOriginalDescription());
        $this->assertEquals($expected['isFreeItem'], $related->isFreeItem());
        $this->assertEquals($expected['type'], $related->getType());
    }
}
