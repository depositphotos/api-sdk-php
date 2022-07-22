<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetGroupResponse extends ResponseObject
{
    public function getGroupId(): int
    {
        return (int) $this->getProperty('groupId');
    }

    public function getProfileId(): int
    {
        return (int) $this->getProperty('profileId');
    }

    public function getMoney(): float
    {
        return (float) $this->getProperty('money');
    }

    public function getVatNumber(): string
    {
        return (string) $this->getProperty('vatNumber');
    }

    public function getVatRate(): float
    {
        return (float) $this->getProperty('vatRate');
    }

    public function isVatEnabled(): bool
    {
        return (bool) $this->getProperty('vatEnabled');
    }

    public function isPostPayment(): bool
    {
        return (bool) $this->getProperty('isPostpayment');
    }

    public function getBalance(): float
    {
        return (float) $this->getProperty('balance');
    }
}
