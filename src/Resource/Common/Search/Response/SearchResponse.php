<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response;

use Depositphotos\SDK\Resource\Common\Search\Response\Common\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class SearchResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return (array) $this->getProperty('result', Item::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }

    public function getHash(): string
    {
        return (string) $this->getProperty('hash');
    }
}
