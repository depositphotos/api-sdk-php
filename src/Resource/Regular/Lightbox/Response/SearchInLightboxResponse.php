<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\SearchInLightbox\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class SearchInLightboxResponse extends ResponseObject
{
    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }

    public function getHash(): string
    {
        return (string) $this->getProperty('hash');
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return (array) $this->getProperty('result', Item::class);
    }
}
