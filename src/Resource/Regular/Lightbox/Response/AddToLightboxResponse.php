<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\AddToLightbox\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class AddToLightboxResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return (array) $this->getProperty('items', Item::class);
    }
}
