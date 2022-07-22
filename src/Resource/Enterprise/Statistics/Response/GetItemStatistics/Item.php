<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetItemStatistics;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Item extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
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

    public function getType(): string
    {
        return (string) $this->getProperty('type');
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

    public function getUploaded(): DateTimeInterface
    {
        return $this->getDateTime('uploadTimestamp');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('nudity');
    }

    public function getComps(): int
    {
        return (int) $this->getProperty('comps');
    }

    public function getLicenses(): int
    {
        return (int) $this->getProperty('licenses');
    }

    public function getTransfers(): int
    {
        return (int) $this->getProperty('transfers');
    }
}
