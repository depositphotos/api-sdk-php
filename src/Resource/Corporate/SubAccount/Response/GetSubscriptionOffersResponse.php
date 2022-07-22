<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubscriptionOffers\Offer;
use Depositphotos\SDK\Resource\ResponseObject;

class GetSubscriptionOffersResponse extends ResponseObject
{
    /**
     * @return Offer[]
     */
    public function getOffers(): array
    {
        return (array) $this->getProperty('offers', Offer::class);
    }
}
