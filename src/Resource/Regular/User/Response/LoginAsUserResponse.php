<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class LoginAsUserResponse extends ResponseObject
{
    public function getSessionId(): string
    {
        return (string) $this->getProperty('sessionid');
    }

    public function getUserId(): int
    {
        return (int) $this->getProperty('userid');
    }
}
