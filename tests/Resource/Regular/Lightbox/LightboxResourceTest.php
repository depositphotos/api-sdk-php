<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\Lightbox;

use Depositphotos\SDK\Resource\Regular\Lightbox\LightboxResource;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\AddToLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\CreateLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\GetLightboxesRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\GetLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\RemoveFromLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\RemoveLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\SearchInLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\UpdateLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common\Lightbox;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class LightboxResourceTest extends BaseTestCase
{
    use ResourceTrait;

    private const DATE_FORMAT = 'M.d, Y H:i:s';

    public function testCreateLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.createLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->createLightbox(new CreateLightboxRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_lightbox_title'),
            $this->getFixture('request.dp_lightbox_description')
        ));

        $this->assertLightbox($this->getFixture('response.lightbox'), $result->getLightbox());
    }

    public function testGetLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.getLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->getLightbox(new GetLightboxRequest(
            $this->getFixture('request.dp_lightbox_id'),
            $this->getFixture('request.dp_datetime_format')
        ));

        $this->assertLightbox($this->getFixture('response.lightbox'), $result->getLightbox());
    }

    public function testGetLightboxes(): void
    {
        $this->loadFixtures('commands.regular.lightbox.getLightboxes');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->getLightboxes(new GetLightboxesRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getLightboxes() as $key => $lightbox) {
            $this->assertLightbox($this->getFixture('response.lightboxes')[$key], $lightbox);
        }
    }

    public function testUpdateLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.updateLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->updateLightbox(new UpdateLightboxRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_lightbox_id'),
            $this->getFixture('request.dp_lightbox_title'),
            $this->getFixture('request.dp_lightbox_description'),
            $this->getFixture('request.dp_lightbox_public')
        ));

        $this->assertLightbox($this->getFixture('response.lightbox'), $result->getLightbox());
    }

    public function testRemoveLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.removeLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $resource->removeLightbox(new RemoveLightboxRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_lightbox_id')
        ));
    }

    public function testAddToLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.addToLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->addToLightbox(new AddToLightboxRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_lightbox_id'),
            $this->getFixture('request.dp_media_id')
        ));

        foreach ($result->getItems() as $key => $item) {
            $this->assertEquals($this->getFixture('response.items')[$key]['id'], $item->getId());
            $this->assertEquals($this->getFixture('response.items')[$key]['title'], $item->getTitle());
            $this->assertEquals($this->getFixture('response.items')[$key]['description'], $item->getDescription());
            $this->assertEquals($this->getFixture('response.items')[$key]['width'], $item->getWidth());
            $this->assertEquals($this->getFixture('response.items')[$key]['height'], $item->getHeight());
            $this->assertEquals($this->getFixture('response.items')[$key]['mp'], $item->getMp());
            $this->assertEquals($this->getFixture('response.items')[$key]['username'], $item->getUsername());
            $this->assertEquals($this->getFixture('response.items')[$key]['status'], $item->getStatus());
            $this->assertEquals($this->getFixture('response.items')[$key]['views'], $item->getViews());
            $this->assertEquals($this->getFixture('response.items')[$key]['downloads'], $item->getDownloads());
            $this->assertEquals($this->getFixture('response.items')[$key]['level'], $item->getLevel());
            $this->assertEquals($this->getFixture('response.items')[$key]['similar'], $item->getSimilar());
            $this->assertEquals($this->getFixture('response.items')[$key]['userid'], $item->getUserId());
            $this->assertEquals($this->getFixture('response.items')[$key]['published'], $item->getPublished()->format(self::DATE_FORMAT));
            $this->assertEquals($this->getFixture('response.items')[$key]['updated'], $item->getUpdated()->format(self::DATE_FORMAT));
            $this->assertEquals($this->getFixture('response.items')[$key]['iseditorial'], $item->isEditorial());
            $this->assertEquals($this->getFixture('response.items')[$key]['itype'], $item->getType());
            $this->assertEquals($this->getFixture('response.items')[$key]['thumbnail'], $item->getThumbnail());
            $this->assertEquals($this->getFixture('response.items')[$key]['medium_thumbnail'], $item->getMediumThumbnail());
            $this->assertEquals($this->getFixture('response.items')[$key]['large_thumb'], $item->getLargeThumbnail());
            $this->assertEquals($this->getFixture('response.items')[$key]['huge_thumb'], $item->getHugeThumbnail());
            $this->assertEquals($this->getFixture('response.items')[$key]['url'], $item->getUrl());
            $this->assertEquals($this->getFixture('response.items')[$key]['url2'], $item->getUrl2());
            $this->assertEquals($this->getFixture('response.items')[$key]['url_big'], $item->getBigThumbnail());
            $this->assertEquals($this->getFixture('response.items')[$key]['url_max_qa'], $item->getMaxQaUrl());
            $this->assertEquals($this->getFixture('response.items')[$key]['itemurl'], $item->getItemUrl());
            $this->assertEquals($this->getFixture('response.items')[$key]['added'], $item->getAdded());
            $this->assertEquals($this->getFixture('response.items')[$key]['sizeMask'], $item->getSizeMask());
            $this->assertEquals($this->getFixture('response.items')[$key]['lightbox_discount'], $item->getLightboxDiscount());
        }
    }

    public function testRemoveFromLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.removeFromLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $resource->removeFromLightbox(new RemoveFromLightboxRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_lightbox_id'),
            $this->getFixture('request.dp_media_id')
        ));
    }

    public function testSearchInLightbox(): void
    {
        $this->loadFixtures('commands.regular.lightbox.searchInLightbox');

        $resource = new LightboxResource($this->createHttpClient());
        $result = $resource->searchInLightbox(new SearchInLightboxRequest(
            $this->getFixture('request.dp_lightbox_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_query')
        ));

        foreach ($result->getItems() as $key => $item) {
            $this->assertEquals($this->getFixture('response.result')[$key]['id'], $item->getId());
            $this->assertEquals($this->getFixture('response.result')[$key]['title'], $item->getTitle());
            $this->assertEquals($this->getFixture('response.result')[$key]['description'], $item->getDescription());
            $this->assertEquals($this->getFixture('response.result')[$key]['width'], $item->getWidth());
            $this->assertEquals($this->getFixture('response.result')[$key]['height'], $item->getHeight());
            $this->assertEquals($this->getFixture('response.result')[$key]['mp'], $item->getMp());
            $this->assertEquals($this->getFixture('response.result')[$key]['username'], $item->getUsername());
            $this->assertEquals($this->getFixture('response.result')[$key]['status'], $item->getStatus());
            $this->assertEquals($this->getFixture('response.result')[$key]['views'], $item->getViews());
            $this->assertEquals($this->getFixture('response.result')[$key]['downloads'], $item->getDownloads());
            $this->assertEquals($this->getFixture('response.result')[$key]['level'], $item->getLevel());
            $this->assertEquals($this->getFixture('response.result')[$key]['userid'], $item->getUserId());
            $this->assertEquals($this->getFixture('response.result')[$key]['published'], $item->getPublished()->format(self::DATE_FORMAT));
            $this->assertEquals($this->getFixture('response.result')[$key]['updated'], $item->getUpdated()->format(self::DATE_FORMAT));
            $this->assertEquals($this->getFixture('response.result')[$key]['iseditorial'], $item->isEditorial());
            $this->assertEquals($this->getFixture('response.result')[$key]['itype'], $item->getType());
            $this->assertEquals($this->getFixture('response.result')[$key]['thumbnail'], $item->getThumbnail());
            $this->assertEquals($this->getFixture('response.result')[$key]['medium_thumbnail'], $item->getMediumThumbnail());
            $this->assertEquals($this->getFixture('response.result')[$key]['large_thumb'], $item->getLargeThumbnail());
            $this->assertEquals($this->getFixture('response.result')[$key]['huge_thumb'], $item->getHugeThumbnail());
            $this->assertEquals($this->getFixture('response.result')[$key]['url'], $item->getUrl());
            $this->assertEquals($this->getFixture('response.result')[$key]['url2'], $item->getUrl2());
            $this->assertEquals($this->getFixture('response.result')[$key]['url_big'], $item->getBigThumbnail());
            $this->assertEquals($this->getFixture('response.result')[$key]['url_max_qa'], $item->getMaxQaUrl());
            $this->assertEquals($this->getFixture('response.result')[$key]['itemurl'], $item->getItemUrl());
            $this->assertEquals($this->getFixture('response.result')[$key]['isextended'], $item->isExtended());
            $this->assertEquals($this->getFixture('response.result')[$key]['isexclusive'], $item->isExclusive());
            $this->assertEquals($this->getFixture('response.result')[$key]['nudity'], $item->isNudity());
            $this->assertEquals($this->getFixture('response.result')[$key]['isFreeItem'], $item->isFree());
            $this->assertEquals($this->getFixture('response.result')[$key]['blocked'], $item->isBlocked());
            $this->assertEquals($this->getFixture('response.result')[$key]['upload_timestamp'], $item->getUploaded()->getTimestamp());
            $this->assertEquals($this->getFixture('response.result')[$key]['original_filesize'], $item->getOriginalFilesize());
            $this->assertEquals($this->getFixture('response.result')[$key]['original_extension'], $item->getOriginalExtension());
            $this->assertEquals($this->getFixture('response.result')[$key]['tags'], $item->getTags());
        }
    }
    
    private function assertLightbox(array $expected, Lightbox $lightbox): void
    {
        $this->assertEquals($expected['lightboxId'], $lightbox->getId());
        $this->assertEquals($expected['title'], $lightbox->getTitle());
        $this->assertEquals($expected['description'], $lightbox->getDescription());
        $this->assertEquals($expected['count'], $lightbox->getCount());
        $this->assertEquals($expected['created'], $lightbox->getCreated()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['updated'], $lightbox->getUpdated()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['public'], $lightbox->isPublic());
        $this->assertEquals($expected['keywords'], $lightbox->getKeywords());
        $this->assertEquals($expected['link'], $lightbox->getLink());
        $this->assertEquals($expected['userId'], $lightbox->getUserId());
        $this->assertEquals($expected['userName'], $lightbox->getUsername());
        $this->assertEquals($expected['permission'], $lightbox->getPermission());
        $this->assertEquals($expected['allowedActions'], $lightbox->getAllowedActions());
        $this->assertEquals($expected['items'], $lightbox->getItems());
    }
}
