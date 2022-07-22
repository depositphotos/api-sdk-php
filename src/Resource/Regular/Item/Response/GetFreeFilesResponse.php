<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response;

use Depositphotos\SDK\Resource\Regular\Item\Response\GetFreeFiles\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class GetFreeFilesResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return (array) $this->getProperty('items', Item::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
