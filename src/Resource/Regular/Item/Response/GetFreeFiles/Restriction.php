<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response\GetFreeFiles;

use Depositphotos\SDK\Resource\ResponseObject;

class Restriction extends ResponseObject
{
    public function getCountries(): array
    {
        return (array) $this->getProperty('countries');
    }
}
