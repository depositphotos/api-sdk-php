<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase\Response\GetPurchases;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Purchase extends ResponseObject
{
    public function getLicenseId(): int
    {
        return (int) $this->getProperty('licenseId');
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

    public function getMethod(): string
    {
        return (string) $this->getProperty('method');
    }

    public function getPurchased(): DateTimeInterface
    {
        return $this->getDateTime('purchaseDate');
    }

    public function getPurchasedWidth(): int
    {
        return (int) $this->getProperty('purchasedWidth');
    }

    public function getPurchasedHeight(): int
    {
        return (int) $this->getProperty('purchasedHeight');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getItem(): Item
    {
        return new Item($this->data);
    }
}
