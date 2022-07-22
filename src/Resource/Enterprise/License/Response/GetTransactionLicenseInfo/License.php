<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo;

use Depositphotos\SDK\Resource\ResponseObject;

class License extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    /**
     * @return LicenseField[]
     */
    public function getFields(): array
    {
        return (array) $this->getProperty('fields', LicenseField::class);
    }

    public function getTransferId(): ?int
    {
        $transferId = $this->getProperty('transferId');

        return is_numeric($transferId) ? (int) $transferId : null;
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('size');
    }
}
