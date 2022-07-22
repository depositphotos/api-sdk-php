<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\GetSearchColors;

use Depositphotos\SDK\Resource\ResponseObject;

class Color extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getHex(): string
    {
        return (string) $this->getProperty('hex');
    }
}
