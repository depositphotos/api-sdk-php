<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class RegisterNewUserResponse extends ResponseObject
{
    public function getUserId(): int
    {
        return (int) $this->getProperty('userid');
    }
}
