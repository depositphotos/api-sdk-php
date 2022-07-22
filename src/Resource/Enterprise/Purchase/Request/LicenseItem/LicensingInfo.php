<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Request\LicenseItem;

class LicensingInfo
{
    /** @var int[] */
    private $itemIds;

    /** @var string */
    private $size;

    /** @var int */
    private $licenseId;

    /** @var null|int */
    private $extOption;

    public function __construct(array $itemIds, string $size, int $licenseId, int $extOption = null)
    {
        $this->itemIds = $itemIds;
        $this->size = $size;
        $this->licenseId = $licenseId;
        $this->extOption = $extOption;
    }

    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getLicenseId(): int
    {
        return $this->licenseId;
    }

    public function getExtOption(): ?int
    {
        return $this->extOption;
    }
}
