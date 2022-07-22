<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo;

use Depositphotos\SDK\Resource\ResponseObject;

class ExtOption extends ResponseObject
{
    public function getOption(): int
    {
        return (int) $this->getProperty('option');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getPriceUsd(): float
    {
        return (float) $this->getProperty('price_usd');
    }
}
