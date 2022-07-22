<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\Common;

use Depositphotos\SDK\Resource\ResponseObject;

class Size extends ResponseObject
{
    public function getName(): string
    {
        return (string) $this->getProperty('name');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getCredits(): int
    {
        return (int) $this->getProperty('credits');
    }

    public function getSubscription(): int
    {
        return (int) $this->getProperty('subscription');
    }

    public function getImagePack(): int
    {
        return (int) $this->getProperty('imagepack');
    }

    public function getOnDemand(): int
    {
        return (int) $this->getProperty('ondemand');
    }

    public function getMp(): float
    {
        return (float) $this->getProperty('mp');
    }
}
