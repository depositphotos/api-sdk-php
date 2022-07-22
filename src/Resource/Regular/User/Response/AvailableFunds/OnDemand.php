<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response\AvailableFunds;

use Depositphotos\SDK\Resource\ResponseObject;

class OnDemand extends ResponseObject
{
    public function getBalance(): int
    {
        return (int) $this->getProperty('balance');
    }

    public function getProduct(): string
    {
        return (string) $this->getProperty('product');
    }

    public function getSubProduct(): string
    {
        return (string) $this->getProperty('subproduct');
    }

    public function getExpire(): \DateTimeInterface
    {
        return $this->getDateTime('expire');
    }
}
