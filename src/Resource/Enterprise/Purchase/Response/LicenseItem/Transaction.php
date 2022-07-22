<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem;

use Depositphotos\SDK\Resource\ResponseObject;

class Transaction extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('transactionId');
    }

    public function getLicenseId(): int
    {
        return (int) $this->getProperty('license');
    }

    public function getSizes(): int
    {
        return (int) $this->getProperty('sizes');
    }
}
