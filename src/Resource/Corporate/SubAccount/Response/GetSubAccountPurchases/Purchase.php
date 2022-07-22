<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubAccountPurchases;

use Depositphotos\SDK\Resource\ResponseObject;

class Purchase extends ResponseObject
{
    public function getItemId(): int
    {
        return (int) $this->getProperty('mediaId');
    }

    public function getLicense(): string
    {
        return (string) $this->getProperty('license');
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('size');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getPurchaseDate(): \DateTimeInterface
    {
        return $this->getDateTime('purchaseDate');
    }

    public function getUrl(): string
    {
        return (string) $this->getProperty('url');
    }

    public function getLicenseId(): int
    {
        return (int) $this->getProperty('licenseId');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getMp(): float
    {
        return (float) $this->getProperty('mp');
    }
}
