<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\User;
use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\Stats;

class UpdateUserResponse extends User
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function isEnabled(): bool
    {
        return (bool) $this->getProperty('enterpriseEnabled');
    }

    public function getStats(): Stats
    {
        return $this->getProperty('enterpriseStats', Stats::class);
    }
}
