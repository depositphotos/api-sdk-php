<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response\SearchInLightbox;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common\Item as BaseItem;

class Item extends BaseItem
{
    public function isExtended(): bool
    {
        return (bool) $this->getProperty('isextended');
    }

    public function isExclusive(): bool
    {
        return (bool) $this->getProperty('isexclusive');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('nudity');
    }

    public function isFree(): bool
    {
        return (bool) $this->getProperty('isFreeItem');
    }

    public function isBlocked(): bool
    {
        return (bool) $this->getProperty('blocked');
    }

    public function getUploaded(): \DateTimeInterface
    {
        return $this->getDateTime('upload_timestamp');
    }

    public function getOriginalFilesize(): int
    {
        return (int) $this->getProperty('original_filesize');
    }

    public function getOriginalExtension(): string
    {
        return (string) $this->getProperty('original_extension');
    }

    public function getTags(): array
    {
        return (array) $this->getProperty('tags');
    }
}
