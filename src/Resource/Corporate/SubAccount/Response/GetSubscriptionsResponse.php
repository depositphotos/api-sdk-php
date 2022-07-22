<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\Common\Subscription;
use Depositphotos\SDK\Resource\ResponseObject;

class GetSubscriptionsResponse extends ResponseObject
{
    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return (array) $this->getProperty('subscriptions', Subscription::class);
    }
}
