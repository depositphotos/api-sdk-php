<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetRestrictedSellersResponse extends ResponseObject
{
    /**
     * @return int[]
     */
    public function getRestrictedSellers(): array
    {
        return (array) $this->getProperty('restricted_sellers');
    }
}
