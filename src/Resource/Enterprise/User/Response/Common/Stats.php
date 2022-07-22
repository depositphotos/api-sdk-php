<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response\Common;

use Depositphotos\SDK\Resource\ResponseObject;

class Stats extends ResponseObject
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
