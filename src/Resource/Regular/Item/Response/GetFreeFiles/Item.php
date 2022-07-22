<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response\GetFreeFiles;

use Depositphotos\SDK\Resource\ResponseObject;

class Item extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getFilename(): string
    {
        return (string) $this->getProperty('filename');
    }

    public function getThumbSource(): string
    {
        return (string) $this->getProperty('thumbSource');
    }

    public function getAlt(): ?string
    {
        return $this->getProperty('alt');
    }

    public function isBlocked(): bool
    {
        return (bool) $this->getProperty('blocked');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getRestrictions(): array
    {
        return $this->getProperty('restrictions', Restriction::class);
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getSellerId(): int
    {
        return (int) $this->getProperty('sellerId');
    }

    public function getSellerName(): string
    {
        return (string) $this->getProperty('sellerName');
    }

    public function isEditorial(): bool
    {
        return (bool) $this->getProperty('editorial');
    }

    public function getMp(): float
    {
        return (float) $this->getProperty('mp');
    }

    public function getUploadDate(): \DateTimeInterface
    {
        return $this->getDateTime('uploadTimestamp');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('nudity');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getRoyaltyModel(): string
    {
        return (string) $this->getProperty('royaltyModel');
    }

    public function getThumbnail(): string
    {
        return (string) $this->getProperty('thumbUrl');
    }

    public function getMediumThumbnail(): string
    {
        return (string) $this->getProperty('thumb_medium');
    }

    public function getBigThumbnail(): string
    {
        return (string) $this->getProperty('thumbBigUrl');
    }

    public function getHugeThumbnail(): string
    {
        return (string) $this->getProperty('thumb_huge');
    }

    public function getMaxThumbnail(): string
    {
        return (string) $this->getProperty('thumb_max');
    }

    public function getPurchaseInfo(): PurchaseInfo
    {
        return $this->getProperty('purchase_info', PurchaseInfo::class);
    }
}
