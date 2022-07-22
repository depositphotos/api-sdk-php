<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetTotalStatisticsResponse extends ResponseObject
{
    public function getComps(): int
    {
        return (int) $this->getProperty('comps');
    }

    public function getLicensed(): int
    {
        return (int) $this->getProperty('licensed');
    }

    public function getTransferred(): int
    {
        return (int) $this->getProperty('transferred');
    }
}
