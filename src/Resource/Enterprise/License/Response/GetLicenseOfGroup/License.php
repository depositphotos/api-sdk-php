<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetLicenseOfGroup;

use Depositphotos\SDK\Resource\ResponseObject;

class License extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('licenseID');
    }

    public function getName(): string
    {
        return (string) $this->getProperty('licenseName');
    }

    public function getProductType(): string
    {
        return (string) $this->getProperty('productType');
    }

    public function getEnabledSizesCount(): int
    {
        return (int) $this->getProperty('enabledSizesCount');
    }

    /**
     * @return Size[]
     */
    public function getSizes(): array
    {
        return (array) $this->getProperty('sizes', Size::class);
    }
}
