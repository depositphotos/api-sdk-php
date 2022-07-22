<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Common\Purchase;

use Depositphotos\SDK\Resource\Common\Purchase\PurchaseResource;
use Depositphotos\SDK\Resource\Common\Purchase\Request\GetPurchasesRequest;
use Depositphotos\SDK\Resource\Common\Purchase\Request\GetRestrictedSellersRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class PurchaseResourceTest extends BaseTestCase
{
    use ResourceTrait;

    private const DATE_FORMAT = 'M.d, Y H:i:s';

    public function testGetRestrictedSellers(): void
    {
        $this->loadFixtures('commands.common.purchase.getRestrictedSellers');

        $resource = new PurchaseResource($this->createHttpClient());
        $result = $resource->getRestrictedSellers(new GetRestrictedSellersRequest(
            $this->getFixture('request.dp_session_id')
        ));

        $this->assertEquals($this->getFixture('response.restricted_sellers'), $result->getRestrictedSellers());
    }

    public function testGetPurchases(): void
    {
        $this->loadFixtures('commands.common.purchase.getPurchases');

        $resource = new PurchaseResource($this->createHttpClient());
        $request = new GetPurchasesRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset')
        );
        $request
            ->setSortField($this->getFixture('request.dp_sort_field'))
            ->setSortType($this->getFixture('request.dp_sort_type'));
        $result = $resource->getPurchases($request);

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getPurchases() as $key => $purchase) {
            $fixture = $this->getFixture('response.purchases')[$key];

            $this->assertEquals($fixture['license'], $purchase->getLicense());
            $this->assertEquals($fixture['size'], $purchase->getSize());
            $this->assertEquals($fixture['price'], $purchase->getPrice());
            $this->assertEquals($fixture['method'], $purchase->getMethod());
            $this->assertEquals($fixture['purchaseDate'], $purchase->getPurchased()->format(self::DATE_FORMAT));
            $this->assertEquals($fixture['licenseId'], $purchase->getLicenseId());
            $this->assertEquals($fixture['purchasedWidth'], $purchase->getPurchasedWidth());
            $this->assertEquals($fixture['purchasedHeight'], $purchase->getPurchasedHeight());
            $this->assertEquals($fixture['status'], $purchase->getStatus());
            $this->assertEquals($fixture['mediaId'], $purchase->getItem()->getId());
            $this->assertEquals($fixture['title'], $purchase->getItem()->getTitle());
            $this->assertEquals($fixture['description'], $purchase->getItem()->getDescription());
            $this->assertEquals($fixture['width'], $purchase->getItem()->getWidth());
            $this->assertEquals($fixture['height'], $purchase->getItem()->getHeight());
            $this->assertEquals($fixture['views'], $purchase->getItem()->getViews());
            $this->assertEquals($fixture['mp'], $purchase->getItem()->getMp());
            $this->assertEquals($fixture['downloads'], $purchase->getItem()->getDownloads());
            $this->assertEquals($fixture['username'], $purchase->getItem()->getUsername());
            $this->assertEquals($fixture['level'], $purchase->getItem()->getLevel());
            $this->assertEquals($fixture['userid'], $purchase->getItem()->getUserId());
            $this->assertEquals($fixture['published'], $purchase->getItem()->getPublished()->format(self::DATE_FORMAT));
            $this->assertEquals($fixture['updated'], $purchase->getItem()->getUpdated()->format(self::DATE_FORMAT));
            $this->assertEquals($fixture['iseditorial'], $purchase->getItem()->isEditorial());
            $this->assertEquals($fixture['itype'], $purchase->getItem()->getType());
            $this->assertEquals($fixture['thumbnail'], $purchase->getItem()->getThumbnail());
            $this->assertEquals($fixture['medium_thumbnail'], $purchase->getItem()->getMediumThumbnail());
            $this->assertEquals($fixture['large_thumb'], $purchase->getItem()->getLargeThumbnail());
            $this->assertEquals($fixture['huge_thumb'], $purchase->getItem()->getHugeThumbnail());
            $this->assertEquals($fixture['url'], $purchase->getItem()->getUrl());
            $this->assertEquals($fixture['url2'], $purchase->getItem()->getUrl2());
            $this->assertEquals($fixture['url_big'], $purchase->getItem()->getBigUrl());
            $this->assertEquals($fixture['url_max_qa'], $purchase->getItem()->getMaxQaUrl());
            $this->assertEquals($fixture['itemurl'], $purchase->getItem()->getItemUrl());
            $this->assertEquals($fixture['isFreeItem'], $purchase->getItem()->isFreeItem());
        }
    }
}
