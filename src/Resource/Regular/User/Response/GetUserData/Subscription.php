<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response\GetUserData;

use Depositphotos\SDK\Resource\ResponseObject;

class Subscription extends ResponseObject
{
    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getPurchaseMethod(): string
    {
        return (string) $this->getProperty('purchaseMethod');
    }

    public function getBeginDate(): \DateTimeInterface
    {
        return $this->getDateTime('dateBegin');
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->getDateTime('dateEnd');
    }

    public function getPeriod(): int
    {
        return (int) $this->getProperty('period');
    }

    public function getAmount(): int
    {
        return (int) $this->getProperty('amount');
    }
}
