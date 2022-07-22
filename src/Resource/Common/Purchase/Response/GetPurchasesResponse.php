<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase\Response;

use Depositphotos\SDK\Resource\Common\Purchase\Response\GetPurchases\Purchase;
use Depositphotos\SDK\Resource\ResponseObject;

class GetPurchasesResponse extends ResponseObject
{
    /**
     * @return Purchase[]
     */
    public function getPurchases(): array
    {
        return (array) $this->getProperty('purchases', Purchase::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
