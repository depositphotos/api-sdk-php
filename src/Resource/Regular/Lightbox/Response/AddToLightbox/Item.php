<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response\AddToLightbox;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common\Item as BaseItem;

class Item extends BaseItem
{
    public function getSimilar(): array
    {
        return (array) $this->getProperty('similar');
    }

    public function getAdded(): ?\DateTimeInterface
    {
        return $this->getDateTimeOrNull('added');
    }

    public function getSizeMask(): int
    {
        return (int) $this->getProperty('sizeMask');
    }

    public function getLightboxDiscount(): int
    {
        return (int) $this->getProperty('lightbox_discount');
    }
}
