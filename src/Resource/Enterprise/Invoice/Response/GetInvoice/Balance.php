<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice;

use Depositphotos\SDK\Resource\ResponseObject;

class Balance extends ResponseObject
{
    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getQty(): int
    {
        return (int) $this->getProperty('qty');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }
}
