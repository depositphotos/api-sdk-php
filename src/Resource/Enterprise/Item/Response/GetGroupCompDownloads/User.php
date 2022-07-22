<?php

namespace Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloads;

use Depositphotos\SDK\Resource\ResponseObject;

class User extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getUsername(): string
    {
        return (string) $this->getProperty('username');
    }
}
