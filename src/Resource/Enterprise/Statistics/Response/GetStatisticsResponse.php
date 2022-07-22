<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Response;

use Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetStatistics\Statistics;
use Depositphotos\SDK\Resource\ResponseObject;

class GetStatisticsResponse extends ResponseObject
{
    /**
     * @return Statistics[]
     */
    public function getStatistics(): array
    {
        return (array) $this->getProperty('data', Statistics::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
