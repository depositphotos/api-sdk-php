<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\Item;

use Depositphotos\SDK\Resource\Regular\Item\ItemResource;
use Depositphotos\SDK\Resource\Regular\Item\Request\GetFilesCountRequest;
use Depositphotos\SDK\Resource\Regular\Item\Request\GetFreeFilesRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class ItemResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetFilesCount(): void
    {
        $this->loadFixtures('commands.regular.item.getFilesCount');

        $resource = new ItemResource($this->createHttpClient());
        $result = $resource->getFilesCount(new GetFilesCountRequest($this->getFixture('request.dp_type')));

        $this->assertEquals($this->getFixture('response.itemType'), $result->getItemType());
        $this->assertEquals($this->getFixture('response.count'), $result->getCount());
        $this->assertEquals($this->getFixture('response.contributorsCount'), $result->getContributorsCount());
        $this->assertEquals($this->getFixture('response.freeItemsCount'), $result->getFreeItemsCount());
        $this->assertEquals($this->getFixture('response.curatedItemsCount'), $result->getCuratedItemsCount());
        $this->assertEquals($this->getFixture('response.customers'), $result->getCustomers());
        $this->assertEquals($this->getFixture('response.free')['total'], $result->getFree()->getTotal());
        $this->assertEquals($this->getFixture('response.free')['image'], $result->getFree()->getImage());
        $this->assertEquals($this->getFixture('response.free')['vector'], $result->getFree()->getVector());
        $this->assertEquals($this->getFixture('response.free')['video'], $result->getFree()->getVideo());
        $this->assertEquals($this->getFixture('response.free')['editorial'], $result->getFree()->getEditorial());
    }

    public function testGetFreeFiles(): void
    {
        $this->loadFixtures('commands.regular.item.getFreeFiles');

        $resource = new ItemResource($this->createHttpClient());
        $result = $resource->getFreeFiles(new GetFreeFilesRequest(
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_shuffle'),
            $this->getFixture('request.dp_type')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getItems() as $key => $item) {
            $fixture = $this->getFixture('response.items')[$key];

            $this->assertEquals($fixture['id'], $item->getId());
            $this->assertEquals($fixture['blocked'], $item->isBlocked());
            $this->assertEquals($fixture['height'], $item->getHeight());
            $this->assertEquals($fixture['width'], $item->getWidth());
            $this->assertEquals($fixture['sellerId'], $item->getSellerId());
            $this->assertEquals($fixture['sellerName'], $item->getSellerName());
            $this->assertEquals($fixture['editorial'], $item->isEditorial());
            $this->assertEquals($fixture['mp'], $item->getMp());
            $this->assertEquals($fixture['uploadTimestamp'], $item->getUploadDate()->getTimestamp());
            $this->assertEquals($fixture['nudity'], $item->isNudity());
            $this->assertEquals($fixture['status'], $item->getStatus());
            $this->assertEquals($fixture['royaltyModel'], $item->getRoyaltyModel());
            $this->assertEquals($fixture['alt'], $item->getAlt());
            $this->assertEquals($fixture['title'], $item->getTitle());
            $this->assertEquals($fixture['description'], $item->getDescription());
            $this->assertEquals($fixture['filename'], $item->getFilename());
            $this->assertEquals($fixture['thumbSource'], $item->getThumbSource());
            $this->assertEquals($fixture['type'], $item->getType());
            $this->assertEquals($fixture['thumbUrl'], $item->getThumbnail());
            $this->assertEquals($fixture['thumbBigUrl'], $item->getBigThumbnail());
            $this->assertEquals($fixture['thumb_medium'], $item->getMediumThumbnail());
            $this->assertEquals($fixture['thumb_huge'], $item->getHugeThumbnail());
            $this->assertEquals($fixture['thumb_max'], $item->getMaxThumbnail());
        }
    }
}
