<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response;

use Depositphotos\SDK\Resource\Common\Search\Response\Common\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class GetChangedItemsResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return (array) $this->getProperty('result', Item::class);
    }

    /**
     * @return int[]
     */
    public function getDeleted(): array
    {
        return (array) $this->getProperty('deleted');
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
