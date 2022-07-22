<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response;

use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\GetLicensedItems\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class GetLicensedItemsResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->getProperty('downloads', Item::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
