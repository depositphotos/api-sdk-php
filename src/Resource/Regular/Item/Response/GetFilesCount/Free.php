<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response\GetFilesCount;

use Depositphotos\SDK\Resource\ResponseObject;

class Free extends ResponseObject
{
    public function getTotal(): int
    {
        return (int) $this->getProperty('total');
    }

    public function getImage(): int
    {
        return (int) $this->getProperty('image');
    }

    public function getVector(): int
    {
        return (int) $this->getProperty('vector');
    }

    public function getVideo(): int
    {
        return (int) $this->getProperty('video');
    }

    public function getEditorial(): int
    {
        return (int) $this->getProperty('editorial');
    }
}
