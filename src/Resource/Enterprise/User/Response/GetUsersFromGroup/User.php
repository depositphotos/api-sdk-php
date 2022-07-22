<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response\GetUsersFromGroup;

use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\Stats;
use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\User as BaseUser;

class User extends BaseUser
{
    public function getStats(): Stats
    {
        return $this->getProperty('enterpriseStats', Stats::class);
    }

    public function getPermissions(): array
    {
        return (array) $this->getProperty('permissions', Permission::class);
    }
}
