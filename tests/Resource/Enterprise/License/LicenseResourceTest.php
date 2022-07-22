<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\License;

use Depositphotos\SDK\Resource\Enterprise\License\LicenseResource;
use Depositphotos\SDK\Resource\Enterprise\License\Request\GetLicenseOfGroupRequest;
use Depositphotos\SDK\Resource\Enterprise\License\Request\GetTransactionLicenseInfoRequest;
use Depositphotos\SDK\Resource\Enterprise\License\Request\GetTransferredLicensesRequest;
use Depositphotos\SDK\Resource\Enterprise\License\Request\TransferLicenseRequest;
use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo\LegalInfo;
use Depositphotos\SDK\Resource\Enterprise\License\Request\TransferEnterpriseLicense\LegalInfo as LegalInfoRequest;
use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransferredLicenses\User;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class LicenseResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetLicenseOfGroup(): void
    {
        $this->loadFixtures('commands.enterprise.license.getLicenseOfGroup');

        $resource = new LicenseResource($this->createHttpClient());
        $result = $resource->getLicenseOfGroup(new GetLicenseOfGroupRequest(
            $this->getFixture('request.dp_session_id')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getLicenses() as $key => $license) {
            $this->assertEquals($this->getFixture('response.data')[$key]['licenseID'], $license->getId());
            $this->assertEquals($this->getFixture('response.data')[$key]['licenseName'], $license->getName());
            $this->assertEquals($this->getFixture('response.data')[$key]['productType'], $license->getProductType());
            $this->assertEquals($this->getFixture('response.data')[$key]['enabledSizesCount'], $license->getEnabledSizesCount());

            foreach ($license->getSizes() as $sizeKey => $size) {
                $expectedSize = $this->getFixture('response.data')[$key]['sizes'][$sizeKey];

                $this->assertEquals($expectedSize['id'], $size->getId());
                $this->assertEquals($expectedSize['label'], $size->getLabel());
                $this->assertEquals($expectedSize['price'], $size->getPrice());
                $this->assertEquals($expectedSize['enabled'], $size->isEnabled());
                $this->assertEquals($expectedSize['order'], $size->getOrder());
                $this->assertEquals($expectedSize['netId'], $size->getNetId());
            }
        }
    }

    public function testGetTransactionLicenseInfo(): void
    {
        $this->loadFixtures('commands.enterprise.license.getTransactionLicenseInfo');

        $resource = new LicenseResource($this->createHttpClient());
        $result = $resource->getTransactionLicenseInfo(new GetTransactionLicenseInfoRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_transaction_id')
        ));

        $this->assertEquals($this->getFixture('response.license')['id'], $result->getLicense()->getId());
        $this->assertEquals($this->getFixture('response.license')['name'], $result->getLicense()->getName());
        $this->assertEquals($this->getFixture('response.license')['transferId'], $result->getLicense()->getTransferId());
        $this->assertEquals($this->getFixture('response.license')['size'], $result->getLicense()->getSize());
        $this->assertEquals($this->getFixture('response.license')['id'], $result->getLicense()->getId());

        foreach ($result->getLicense()->getFields() as $key => $field) {
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['name'], $field->getName());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['placeholder'], $field->getPlaceholder());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['order'], $field->getOrder());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['enabled'], $field->isEnabled());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['type'], $field->getType());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['transaction_id'], $field->getTransactionId());
            $this->assertEquals($this->getFixture('response.license')['fields'][$key]['value'], $field->getValue());
        }

        $this->assertEquals($this->getFixture('response.transaction')['id'], $result->getTransaction()->getId());
        $this->assertEquals($this->getFixture('response.transaction')['price'], $result->getTransaction()->getPrice());
        $this->assertEquals($this->getFixture('response.transaction')['size'], $result->getTransaction()->getSize());
        $this->assertEquals($this->getFixture('response.transaction')['timestamp'], $result->getTransaction()->getCreated()->getTimestamp());
        $this->assertEquals($this->getFixture('response.transaction')['currencyId'], $result->getTransaction()->getCurrencyId());

        $this->assertEquals($this->getFixture('response.item')['id'], $result->getItem()->getId());
        $this->assertEquals($this->getFixture('response.item')['filename'], $result->getItem()->getFilename());
        $this->assertEquals($this->getFixture('response.item')['type'], $result->getItem()->getType());
        $this->assertEquals($this->getFixture('response.item')['isEditorial'], $result->getItem()->isEditorial());
        $this->assertEquals($this->getFixture('response.item')['isNudity'], $result->getItem()->isNudity());
        $this->assertEquals($this->getFixture('response.item')['preview'], $result->getItem()->getPreview());
        $this->assertEquals($this->getFixture('response.item')['width'], $result->getItem()->getWidth());
        $this->assertEquals($this->getFixture('response.item')['height'], $result->getItem()->getHeight());

        $this->assertLegalInfo($this->getFixture('response.from'), $result->getFrom());
        $this->assertLegalInfo($this->getFixture('response.to'), $result->getTo());

        if ($this->getFixture('response.transferredTo')) {
            $this->assertLegalInfo($this->getFixture('response.transferredTo'), $result->getTransferredTo());
        }
    }

    public function testTransferLicense(): void
    {
        $this->loadFixtures('commands.enterprise.license.transferEnterpriseLicense');

        $resource = new LicenseResource($this->createHttpClient());

        $fromLegalInfo = new LegalInfoRequest();
        $fromLegalInfo
            ->setCompany($this->getFixture('request.dp_from')['company'])
            ->setFullName($this->getFixture('request.dp_from')['full_name'])
            ->setAddress($this->getFixture('request.dp_from')['address'])
            ->setCity($this->getFixture('request.dp_from')['city'])
            ->setState($this->getFixture('request.dp_from')['state'])
            ->setZip($this->getFixture('request.dp_from')['zip'])
            ->setEmail($this->getFixture('request.dp_from')['email'])
            ->setPhone($this->getFixture('request.dp_from')['phone'])
            ->setCountry($this->getFixture('request.dp_from')['country'])
            ->setWebsite($this->getFixture('request.dp_from')['website'])
            ->setEin($this->getFixture('request.dp_from')['ein'])
            ->setVat($this->getFixture('request.dp_from')['vat'])
            ->setCountryName($this->getFixture('request.dp_from')['country_name']);

        $toLegalInfo = new LegalInfoRequest();
        $toLegalInfo
            ->setCompany($this->getFixture('request.dp_to')['company'])
            ->setFullName($this->getFixture('request.dp_to')['full_name'])
            ->setAddress($this->getFixture('request.dp_to')['address'])
            ->setCity($this->getFixture('request.dp_to')['city'])
            ->setState($this->getFixture('request.dp_to')['state'])
            ->setZip($this->getFixture('request.dp_to')['zip'])
            ->setEmail($this->getFixture('request.dp_to')['email'])
            ->setPhone($this->getFixture('request.dp_to')['phone'])
            ->setCountry($this->getFixture('request.dp_to')['country'])
            ->setWebsite($this->getFixture('request.dp_to')['website'])
            ->setEin($this->getFixture('request.dp_to')['ein'])
            ->setVat($this->getFixture('request.dp_to')['vat'])
            ->setCountryName($this->getFixture('request.dp_to')['country_name']);

        $resource->transferLicense(new TransferLicenseRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_item_transaction_ids'),
            $fromLegalInfo,
            $toLegalInfo
        ));
    }

    public function testGetTransferredLicenses(): void
    {
        $this->loadFixtures('commands.enterprise.license.getTransferredLicenses');

        $resource = new LicenseResource($this->createHttpClient());
        $result = $resource->getTransferredLicenses(new GetTransferredLicensesRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_type'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_group_id'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            new \DateTime($this->getFixture('request.dp_date_end'))
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getTransactions() as $key => $transaction) {
            $fixture = $this->getFixture('response.downloads')[$key];

            $this->assertEquals($fixture['itemTransactionId'], $transaction->getId());
            $this->assertEquals($fixture['licenseTransferId'], $transaction->getLicenseTransferId());
            $this->assertEquals($fixture['licenseId'], $transaction->getLicenseId());
            $this->assertEquals($fixture['status'], $transaction->getStatus());
            $this->assertEquals($fixture['currencyId'], $transaction->getCurrencyId());
            $this->assertEquals($fixture['datetime'], $transaction->getCreated()->getTimestamp());
            $this->assertEquals($fixture['groupId'], $transaction->getGroupId());
            $this->assertEquals($fixture['marker'], $transaction->getMarker());
            $this->assertEquals($fixture['filename'], $transaction->getItem()->getFileName());
            $this->assertEquals($fixture['itemId'], $transaction->getItem()->getId());
            $this->assertEquals($fixture['itemType'], $transaction->getItem()->getType());
            $this->assertEquals($fixture['preview'], $transaction->getItem()->getPreview());
            $this->assertEquals($fixture['width'], $transaction->getItem()->getWidth());
            $this->assertEquals($fixture['height'], $transaction->getItem()->getHeight());
            $this->assertEquals($fixture['editorial'], $transaction->getItem()->isEditorial());
            $this->assertEquals($fixture['visible'], $transaction->getItem()->isVisible());
            $this->assertEquals($fixture['userId'], $transaction->getUserId());
            $this->assertUser($fixture['actor'], $transaction->getActor());
            $this->assertUser($fixture['seller'], $transaction->getSeller());
            $this->assertEquals($fixture['project'], $transaction->getProject());
            $this->assertEquals($fixture['purchaseOrder'], $transaction->getPurchaseOrder());
            $this->assertEquals($fixture['client'], $transaction->getClient());
            $this->assertEquals($fixture['isbn'], $transaction->getIsbn());
            $this->assertEquals($fixture['other'], $transaction->getOther());
        }
    }

    private function assertLegalInfo(array $expected, LegalInfo $legalInfo): void
    {
        $this->assertEquals($expected['company'], $legalInfo->getCompany());
        $this->assertEquals($expected['fullName'], $legalInfo->getFullName());
        $this->assertEquals($expected['address'], $legalInfo->getAddress());
        $this->assertEquals($expected['city'], $legalInfo->getCity());
        $this->assertEquals($expected['state'], $legalInfo->getState());
        $this->assertEquals($expected['zip'], $legalInfo->getZip());
        $this->assertEquals($expected['email'], $legalInfo->getEmail());
        $this->assertEquals($expected['phone'], $legalInfo->getPhone());
        $this->assertEquals($expected['country'], $legalInfo->getCountry());
        $this->assertEquals($expected['website'], $legalInfo->getWebsite());
        $this->assertEquals($expected['ein'], $legalInfo->getEin());
        $this->assertEquals($expected['vat'], $legalInfo->getVat());
        $this->assertEquals($expected['taxId'], $legalInfo->getTaxId());
        $this->assertEquals($expected['countryName'], $legalInfo->getCountryName());
    }

    private function assertUser(array $expected, User $user): void
    {
        $this->assertEquals($expected['id'], $user->getId());
        $this->assertEquals($expected['username'], $user->getUsername());
    }
}
