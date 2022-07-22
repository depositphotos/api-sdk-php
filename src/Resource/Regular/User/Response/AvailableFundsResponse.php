<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\Regular\User\Response\AvailableFunds\Subscription;
use Depositphotos\SDK\Resource\Regular\User\Response\AvailableFunds\OnDemand;
use Depositphotos\SDK\Resource\ResponseObject;

class AvailableFundsResponse extends ResponseObject
{
    public function getBalance(): float
    {
        return (float) $this->getProperty('balance');
    }

    public function getCreditsAvailable(): float
    {
        return (float) $this->getProperty('creditsAvailable');
    }

    public function getCreditsExpire(): string
    {
        return (string) $this->getProperty('creditsExpire');
    }

    public function getSubscriptionDownloadsTodayAvailable(): int
    {
        return (int) $this->getProperty('subscriptionDownloadsTodayAvailable');
    }

    public function getLeftBonusFiles(): int
    {
        return (int) $this->getProperty('leftBonusFiles');
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return (array) $this->getProperty('activeSubscriptions', Subscription::class);
    }

    /**
     * @return OnDemand[]
     */
    public function getOnDemands(): array
    {
        return (array) $this->getProperty('onDemandDownloads', OnDemand::class);
    }
}
