<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubscriptionOffers;

use Depositphotos\SDK\Resource\ResponseObject;

class Offer extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('offerId');
    }

    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getPeriod(): int
    {
        return (int) $this->getProperty('period');
    }

    public function getBuyPeriod(): int
    {
        return (int) $this->getProperty('buyPeriod');
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getDiscount(): float
    {
        return (float) $this->getProperty('discount');
    }
}
