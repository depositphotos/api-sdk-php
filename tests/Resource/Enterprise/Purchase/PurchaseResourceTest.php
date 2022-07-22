<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\Purchase;

use Depositphotos\SDK\Resource\Enterprise\Purchase\PurchaseResource;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\GetDownloadUrlRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\GetLicensedItemsRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\LicenseItem\LicensingInfo;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\LicenseItemRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem\Success;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem\Error;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\GetLicensedItems\User;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class PurchaseResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetDownloadUrl(): void
    {
        $this->loadFixtures('commands.enterprise.purchase.getDownloadLink');

        $resource = new PurchaseResource($this->createHttpClient());
        $result = $resource->getDownloadUrl(new GetDownloadUrlRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_item_id'),
            $this->getFixture('request.dp_option')
        ));

        $this->assertEquals($this->getFixture('response.downloadLink'), $result->getDownloadUrl());
    }

    public function testLicenseItem(): void
    {
        $this->loadFixtures('commands.enterprise.purchase.licenseItem');

        $resource = new PurchaseResource($this->createHttpClient());
        $request = new LicenseItemRequest(
            $this->getFixture('request.dp_session_id'),
            [new LicensingInfo(
                $this->getFixture('request.dp_licensing')[0]['dp_item_id'],
                $this->getFixture('request.dp_licensing')[0]['dp_option'],
                $this->getFixture('request.dp_licensing')[0]['dp_license_id']
            )]
        );
        $request
            ->setProject($this->getFixture('request.dp_project'))
            ->setClient($this->getFixture('request.dp_client'))
            ->setPurchaseOrder($this->getFixture('request.dp_purchase_order'))
            ->setIsbn($this->getFixture('request.dp_isbn'))
            ->setOther($this->getFixture('request.dp_other'));
        $result = $resource->licenseItem($request);

        foreach ($result->getResult() as $item) {
            if ($item instanceof Success) {
                $successResult = $item;
                $successExpected = $this->getFixture('response.result')[$successResult->getItemId()];
                $this->assertInstanceOf(Success::class, $successResult);
                $this->assertEquals($successExpected['fileId'], $successResult->getItemId());
                $this->assertEquals($successExpected['downloadLink'], $successResult->getDownloadUrl());
                $this->assertEquals($successExpected['transaction'][0]['transactionId'], $successResult->getTransactions()[0]->getId());
                $this->assertEquals($successExpected['transaction'][0]['license'], $successResult->getTransactions()[0]->getLicenseId());
                $this->assertEquals($successExpected['transaction'][0]['sizes'], $successResult->getTransactions()[0]->getSizes());
            } elseif ($item instanceof Error) {
                $errorResult = $item;
                $errorExpected = $this->getFixture('response.result')[$errorResult->getItemId()]['errors'][0];
                $this->assertInstanceOf(Error::class, $errorResult);
                $this->assertEquals($errorExpected['error_message'], $errorResult->getMessage());
                $this->assertEquals($errorExpected['error_code'], $errorResult->getCode());
            }
        }
    }

    public function testGetLicensedItems(): void
    {
        $this->loadFixtures('commands.enterprise.purchase.getLicensedItems');

        $resource = new PurchaseResource($this->createHttpClient());
        $request = new GetLicensedItemsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset')
        );
        $request
            ->setType($this->getFixture('request.dp_type'))
            ->setUserId($this->getFixture('request.dp_user_id'))
            ->setGroupId($this->getFixture('request.dp_group_id'))
            ->setStartDate(new \DateTime($this->getFixture('request.dp_date_start')))
            ->setEndDate(new \DateTime($this->getFixture('request.dp_date_end')))
            ->setItemIds($this->getFixture('request.dp_item_ids'))
            ->setMethodIds($this->getFixture('request.dp_method_ids'));

        $result = $resource->getLicensedItems($request);

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getItems() as $key => $item) {
            $fixture = $this->getFixture('response.downloads')[$key];

            $this->assertEquals($fixture['itemTransactionId'], $item->getTransaction()->getId());
            $this->assertEquals($fixture['licenseTransferId'], $item->getTransaction()->getLicenseTransferId());
            $this->assertEquals($fixture['licenseId'], $item->getTransaction()->getLicenseId());
            $this->assertEquals($fixture['status'], $item->getTransaction()->getStatus());
            $this->assertEquals($fixture['currencyId'], $item->getTransaction()->getCurrencyId());
            $this->assertEquals($fixture['datetime'], $item->getTransaction()->getCreated()->getTimestamp());
            $this->assertEquals($fixture['filename'], $item->getFileName());
            $this->assertEquals($fixture['groupId'], $item->getTransaction()->getGroupId());
            $this->assertEquals($fixture['itemId'], $item->getId());
            $this->assertEquals($fixture['marker'], $item->getTransaction()->getMarker());
            $this->assertEquals($fixture['itemType'], $item->getType());
            $this->assertEquals($fixture['preview'], $item->getPreview());
            $this->assertEquals($fixture['width'], $item->getWidth());
            $this->assertEquals($fixture['height'], $item->getHeight());
            $this->assertEquals($fixture['userId'], $item->getTransaction()->getUserId());
            $this->assertUser($fixture['actor'], $item->getTransaction()->getActor());
            $this->assertUser($fixture['seller'], $item->getTransaction()->getSeller());
            $this->assertEquals($fixture['editorial'], $item->isEditorial());
            $this->assertEquals($fixture['visible'], $item->isVisible());
            $this->assertEquals($fixture['invoice_id'], $item->getTransaction()->getInvoiceId());
            $this->assertEquals($fixture['project'], $item->getTransaction()->getProject());
            $this->assertEquals($fixture['purchaseOrder'], $item->getTransaction()->getPurchaseOrder());
            $this->assertEquals($fixture['client'], $item->getTransaction()->getClient());
            $this->assertEquals($fixture['isbn'], $item->getTransaction()->getIsbn());
            $this->assertEquals($fixture['other'], $item->getTransaction()->getOther());
        }
    }

    private function assertUser(array $expected, User $user): void
    {
        $this->assertEquals($expected['id'], $user->getId());
        $this->assertEquals($expected['username'], $user->getUsername());
    }
}
