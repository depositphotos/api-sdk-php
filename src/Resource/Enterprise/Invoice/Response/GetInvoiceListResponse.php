<?php

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response;

use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoiceList\Invoice;
use Depositphotos\SDK\Resource\ResponseObject;

class GetInvoiceListResponse extends ResponseObject
{
    /**
     * @return Invoice[]
     */
    public function getInvoices(): array
    {
        return $this->getProperty('data', Invoice::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
