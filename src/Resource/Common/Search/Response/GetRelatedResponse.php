<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response;

use Depositphotos\SDK\Resource\Common\Search\Response\Common\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class GetRelatedResponse extends ResponseObject
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
