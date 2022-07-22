<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response\AvailableFunds;

use Depositphotos\SDK\Resource\ResponseObject;

class Subscription extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
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

    public function getAmount(): int
    {
        return (int) $this->getProperty('amount');
    }

    public function getPeriod(): int
    {
        return (int) $this->getProperty('period');
    }

    public function getBuyPeriod(): int
    {
        return (int) $this->getProperty('buyPeriod');
    }

    public function getRenewalTime(): \DateTimeInterface
    {
        return $this->getDateTime('renewalTime');
    }

    public function isMembership(): bool
    {
        return (bool) $this->getProperty('membership');
    }

    public function getBalance(): int
    {
        return (int) $this->getProperty('count');
    }
}
