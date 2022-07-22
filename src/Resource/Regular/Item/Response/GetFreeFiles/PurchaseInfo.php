<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response\GetFreeFiles;

use Depositphotos\SDK\Resource\ResponseObject;

class PurchaseInfo extends ResponseObject
{
    public function getPurchased(): array
    {
        return (array) $this->getProperty('purchased');
    }

    public function getLightboxDiscount(): int
    {
        return (int) $this->getProperty('lightbox_discount');
    }
}
