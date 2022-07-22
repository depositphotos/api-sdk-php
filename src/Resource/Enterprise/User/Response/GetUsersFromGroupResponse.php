<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;
use Depositphotos\SDK\Resource\Enterprise\User\Response\GetUsersFromGroup\User;

class GetUsersFromGroupResponse extends ResponseObject
{
    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return (array) $this->getProperty('data', User::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
