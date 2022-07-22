<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetLicenseOfGroup;

use Depositphotos\SDK\Resource\ResponseObject;

class Size extends ResponseObject
{
    public function getId(): string
    {
        return (string) $this->getProperty('id');
    }

    public function getLabel(): string
    {
        return (string) $this->getProperty('label');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function isEnabled(): bool
    {
        return (bool) $this->getProperty('enabled');
    }

    public function getOrder(): int
    {
        return (int) $this->getProperty('order');
    }

    public function getNetId(): int
    {
        return (int) $this->getProperty('netId');
    }

}
