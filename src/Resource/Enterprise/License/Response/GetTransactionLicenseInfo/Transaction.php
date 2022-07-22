<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Transaction extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('size');
    }

    public function getCreated(): DateTimeInterface
    {
        return $this->getDateTime('timestamp');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }

    /**
     * @return ExtOption[]
     */
    public function getExtOptions(): array
    {
        return (array) $this->getProperty('extOptions', ExtOption::class);
    }
}
