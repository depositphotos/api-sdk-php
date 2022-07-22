<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class CreateInvoiceResponse extends ResponseObject
{
    public function getInvoiceId(): int
    {
        return (int) $this->getProperty('invoiceId');
    }
}
