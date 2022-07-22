<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice;

use Depositphotos\SDK\Resource\ResponseObject;

class Tax extends ResponseObject
{
    public function getRate(): ?float
    {
        $rate = $this->getProperty('rate');

        return is_numeric($rate) ? (float) $rate : null;
    }

    public function getName(): ?string
    {
        return $this->getProperty('name');
    }

    public function getRegion(): ?string
    {
        return $this->getProperty('region');
    }
}
