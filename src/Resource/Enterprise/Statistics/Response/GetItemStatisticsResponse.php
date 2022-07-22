<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Response;

use Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetItemStatistics\Item;
use Depositphotos\SDK\Resource\ResponseObject;

class GetItemStatisticsResponse extends ResponseObject
{
    /**
     * @return Item[]
     */
    public function getStatistics(): array
    {
        return (array) $this->getProperty('data', Item::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
