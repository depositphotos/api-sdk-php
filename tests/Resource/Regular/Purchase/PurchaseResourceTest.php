<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\Purchase;

use Depositphotos\SDK\Resource\Regular\Purchase\PurchaseResource;
use Depositphotos\SDK\Resource\Regular\Purchase\Request\GetMediaRequest;
use Depositphotos\SDK\Resource\Regular\Purchase\Request\ReDownloadRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class PurchaseResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetMedia(): void
    {
        $this->loadFixtures('commands.regular.purchase.getMedia');

        $resource = new PurchaseResource($this->createHttpClient());
        $result = $resource->getMedia(new GetMediaRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_media_id'),
            $this->getFixture('request.dp_media_option'),
            $this->getFixture('request.dp_media_license'),
            $this->getFixture('request.dp_subscription_id')
        ));

        $this->assertEquals($this->getFixture('response.downloadLink'), $result->getDownloadLink());
        $this->assertEquals($this->getFixture('response.licenseId'), $result->getLicenseId());
        $this->assertEquals($this->getFixture('response.method'), $result->getMethod());
        $this->assertEquals($this->getFixture('response.option'), $result->getSize());
        $this->assertEquals($this->getFixture('response.itemId'), $result->getItemId());
    }

    public function testReDownload(): void
    {
        $this->loadFixtures('commands.regular.purchase.reDownload');

        $resource = new PurchaseResource($this->createHttpClient());
        $result = $resource->reDownload(new ReDownloadRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_license_id'),
            $this->getFixture('request.dp_subaccount_id'),
            $this->getFixture('request.dp_subaccount_license_id')
        ));

        $this->assertEquals($this->getFixture('response.downloadLink'), $result->getDownloadLink());
        $this->assertEquals($this->getFixture('response.licenseId'), $result->getLicenseId());
        $this->assertEquals($this->getFixture('response.method'), $result->getMethod());
        $this->assertEquals($this->getFixture('response.option'), $result->getSize());
        $this->assertEquals($this->getFixture('response.itemId'), $result->getItemId());
    }
}
