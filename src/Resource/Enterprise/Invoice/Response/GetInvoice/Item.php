<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice;

use Depositphotos\SDK\Resource\ResponseObject;

class Item extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('itemId');
    }

    public function getThumbnail(): string
    {
        return (string) $this->getProperty('thumbUrl');
    }

    /**
     * @return LicenseInfo[]
     */
    public function getLicenseInfo(): array
    {
        return (array) $this->getProperty('licenseInfo', LicenseInfo::class);
    }

    public function getLicenseId(): int
    {
        return (int) $this->getProperty('licenseId');
    }

    public function getLicenseName(): string
    {
        return (string) $this->getProperty('licenseName');
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('size');
    }

    public function getItemOriginalWidth(): int
    {
        return (int) ($this->getProperty('itemOriginalSize')['width'] ?? 0);
    }

    public function getItemOriginalHeight(): int
    {
        return (int) ($this->getProperty('itemOriginalSize')['height'] ?? 0);
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }

    public function getVatPrice(): float
    {
        return (float) $this->getProperty('vatPrice');
    }

    public function getVatRate(): ?float
    {
        $vatRate = $this->getProperty('vatRate');

        return is_numeric($vatRate) ? (float) $vatRate : null;
    }

    public function getTax(): Tax
    {
        return $this->getProperty('tax', Tax::class);
    }

    public function getVatId(): int
    {
        return (int) $this->getProperty('vatId');
    }

    public function isEditorial(): bool
    {
        return (bool) $this->getProperty('isEditorial');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('isNudity');
    }
}
