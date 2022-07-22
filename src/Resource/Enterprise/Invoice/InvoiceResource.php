<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice;

use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\CreateInvoiceRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\GetInvoiceListRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Request\GetInvoiceRequest;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\CreateInvoiceResponse;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoiceListResponse;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoiceResponse;
use Depositphotos\SDK\Resource\Resource;

class InvoiceResource extends Resource
{
    public function createInvoice(CreateInvoiceRequest $request): CreateInvoiceResponse
    {
        $httpResponse = $this->send($request);

        return new CreateInvoiceResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getInvoice(GetInvoiceRequest $request): GetInvoiceResponse
    {
        $httpResponse = $this->send($request);

        return new GetInvoiceResponse($this->convertHttpResponseToArray($httpResponse)['invoice'] ?? []);
    }

    public function getInvoiceList(GetInvoiceListRequest $request): GetInvoiceListResponse
    {
        $httpResponse = $this->send($request);

        return new GetInvoiceListResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
