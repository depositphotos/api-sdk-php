<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\Common\Subscription;
use Depositphotos\SDK\Resource\ResponseObject;

class GetSubAccountDataResponse extends ResponseObject
{
    public function getCreditsAmount(): float
    {
        return (float) $this->getProperty('creditsAmount');
    }

    public function getSubscriptionAmount(): int
    {
        return (int) $this->getProperty('subscriptionAmount');
    }

    public function getInvoiceAmountO(): int
    {
        return (int) $this->getProperty('invoiceAmount');
    }

    public function getFilesAmount(): int
    {
        return (int) $this->getProperty('filesAmount');
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return (array) $this->getProperty('subscriptions', Subscription::class);
    }
}
