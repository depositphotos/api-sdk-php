<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\Invoice;

use Depositphotos\SDK\Resource\Enterprise\Invoice\InvoiceResource;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\CreateInvoiceRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\GetInvoiceListRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\GetInvoiceRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\LegalInfo;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class InvoiceResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testCreateInvoice(): void
    {
        $this->loadFixtures('commands.enterprise.invoice.createEnterpriseInvoice');

        $resource = new InvoiceResource($this->createHttpClient());
        $result = $resource->createInvoice(new CreateInvoiceRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_item_transaction_ids'),
            $this->getFixture('request.dp_field_value')
        ));

        $this->assertEquals($this->getFixture('response.invoiceId'), $result->getInvoiceId());
    }

    public function testGetInvoice(): void
    {
        $this->loadFixtures('commands.enterprise.invoice.getEnterpriseInvoice');

        $resource = new InvoiceResource($this->createHttpClient());
        $result = $resource->getInvoice(new GetInvoiceRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_invoice_id')
        ));

        $this->assertEquals($this->getFixture('response.invoice')['id'], $result->getId());
        $this->assertEquals($this->getFixture('response.invoice')['state'], $result->getState());
        $this->assertEquals($this->getFixture('response.invoice')['total'], $result->getTotal());
        $this->assertEquals($this->getFixture('response.invoice')['vat'], $result->getVat());
        $this->assertEquals($this->getFixture('response.invoice')['tax']['rate'], $result->getTax()->getRate());
        $this->assertEquals($this->getFixture('response.invoice')['tax']['name'], $result->getTax()->getName());
        $this->assertEquals($this->getFixture('response.invoice')['tax']['region'], $result->getTax()->getRegion());
        $this->assertEquals($this->getFixture('response.invoice')['subTotal'], $result->getSubTotal());
        $this->assertEquals($this->getFixture('response.invoice')['number'], $result->getNumber());
        $this->assertEquals($this->getFixture('response.invoice')['type'], $result->getType());
        $this->assertEquals($this->getFixture('response.invoice')['date'], $result->getDate()->getTimestamp());
        $this->assertEquals($this->getFixture('response.invoice')['currencyId'], $result->getCurrencyId());
        $this->assertLegalInfo($this->getFixture('response.invoice')['from'], $result->getFrom());
        $this->assertLegalInfo($this->getFixture('response.invoice')['to'], $result->getTo());
        $this->assertEquals($this->getFixture('response.invoice')['title'], $result->getTitle());
        $this->assertEquals($this->getFixture('response.invoice')['isProforma'], $result->isProforma());

        if (isset($this->getFixture('response.invoice')['paid'])) {
            $this->assertEquals($this->getFixture('response.invoice')['paid'], $result->getPaid()->getTimestamp());
        }

        foreach ($result->getPaymentInstructions() as $key => $paymentInstruction) {
            $this->assertEquals($this->getFixture('response.invoice')['paymentInstructions'][$key]['key'], $paymentInstruction->getKey());
            $this->assertEquals($this->getFixture('response.invoice')['paymentInstructions'][$key]['value'], $paymentInstruction->getValue());
        }

        foreach ($result->getItems() as $key => $item) {
            $fixture = $this->getFixture('response.invoice')['items'][$key];

            $this->assertEquals($fixture['itemId'], $item->getId());
            $this->assertEquals($fixture['thumbUrl'], $item->getThumbnail());
            $this->assertEquals($fixture['licenseId'], $item->getLicenseId());
            $this->assertEquals($fixture['licenseName'], $item->getLicenseName());
            $this->assertEquals($fixture['size'], $item->getSize());
            $this->assertEquals($fixture['itemOriginalSize']['width'], $item->getItemOriginalWidth());
            $this->assertEquals($fixture['itemOriginalSize']['height'], $item->getItemOriginalHeight());
            $this->assertEquals($fixture['type'], $item->getType());
            $this->assertEquals($fixture['price'], $item->getPrice());
            $this->assertEquals($fixture['currencyId'], $item->getCurrencyId());
            $this->assertEquals($fixture['tax']['rate'], $item->getTax()->getRate());
            $this->assertEquals($fixture['tax']['name'], $item->getTax()->getName());
            $this->assertEquals($fixture['tax']['region'], $item->getTax()->getRegion());
            $this->assertEquals($fixture['vatPrice'], $item->getVatPrice());
            $this->assertEquals($fixture['vatId'], $item->getVatId());
            $this->assertEquals($fixture['vatRate'], $item->getVatRate());
            $this->assertEquals($fixture['isEditorial'], $item->isEditorial());
            $this->assertEquals($fixture['isNudity'], $item->isNudity());

            foreach ($item->getLicenseInfo() as $i => $licenseInfo) {
                $this->assertEquals($fixture['licenseInfo'][$i]['key'], $licenseInfo->getKey());
                $this->assertEquals($fixture['licenseInfo'][$i]['value'], $licenseInfo->getValue());
            }
        }
    }

    public function testGetInvoiceList(): void
    {
        $this->loadFixtures('commands.enterprise.invoice.getEnterpriseInvoiceList');

        $resource = new InvoiceResource($this->createHttpClient());
        $result = $resource->getInvoiceList(new GetInvoiceListRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_state')
        ));

        foreach ($result->getInvoices() as $key => $invoice) {
            $fixture = $this->getFixture('response.data')[$key];

            $this->assertEquals($fixture['id'], $invoice->getId());
            $this->assertEquals($fixture['date'], $invoice->getDate()->getTimestamp());
            $this->assertEquals($fixture['title'], $invoice->getTitle());
            $this->assertEquals($fixture['number'], $invoice->getNumber());
            $this->assertEquals($fixture['type'], $invoice->getType());
            $this->assertEquals($fixture['price'], $invoice->getPrice());
            $this->assertEquals($fixture['amount'], $invoice->getAmount());
            $this->assertEquals($fixture['currencyId'], $invoice->getCurrencyId());
            $this->assertEquals($fixture['isProforma'], $invoice->isProforma());

            if (isset($fixture['paymentDate'])) {
                $this->assertEquals($fixture['paymentDate'], $invoice->getPaid()->getTimestamp());
            }
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
}
