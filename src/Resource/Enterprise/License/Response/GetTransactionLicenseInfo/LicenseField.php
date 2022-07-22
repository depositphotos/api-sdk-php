<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo;

use Depositphotos\SDK\Resource\ResponseObject;

class LicenseField extends ResponseObject
{
    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    public function getPlaceholder(): string
    {
        return (string) $this->getProperty('placeholder');
    }

    public function getOrder(): int
    {
        return (int) $this->getProperty('order');
    }

    public function isEnabled(): bool
    {
        return (bool) $this->getProperty('enabled');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getTransactionId(): int
    {
        return (int) $this->getProperty('transaction_id');
    }

    public function getValue(): string
    {
        return (string) $this->getProperty('value');
    }
}
