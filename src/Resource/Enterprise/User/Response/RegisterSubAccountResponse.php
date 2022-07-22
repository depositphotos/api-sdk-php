<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class RegisterSubAccountResponse extends ResponseObject
{
    public function getUserId(): int
    {
        return (int) $this->getProperty('userid');
    }
}
