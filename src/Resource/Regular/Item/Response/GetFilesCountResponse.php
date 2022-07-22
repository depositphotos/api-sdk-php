<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Response;

use Depositphotos\SDK\Resource\Regular\Item\Response\GetFilesCount\Free;
use Depositphotos\SDK\Resource\ResponseObject;

class GetFilesCountResponse extends ResponseObject
{
    public function getItemType(): string
    {
        return (string) $this->getProperty('itemType');
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }

    public function getContributorsCount(): int
    {
        return (int) $this->getProperty('contributorsCount');
    }

    public function getFreeItemsCount(): int
    {
        return (int) $this->getProperty('freeItemsCount');
    }

    public function getCuratedItemsCount(): int
    {
        return (int) $this->getProperty('curatedItemsCount');
    }

    public function getCustomers(): int
    {
        return (int) $this->getProperty('customers');
    }

    public function getFree(): Free
    {
        return $this->getProperty('free', Free::class);
    }
}
