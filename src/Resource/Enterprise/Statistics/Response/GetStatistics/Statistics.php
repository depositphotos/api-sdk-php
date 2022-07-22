<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetStatistics;

use Depositphotos\SDK\Resource\ResponseObject;

class Statistics extends ResponseObject
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

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }
}
