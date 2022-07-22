<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubAccountPurchases\Purchase;
use Depositphotos\SDK\Resource\ResponseObject;

class GetSubAccountPurchasesResponse extends ResponseObject
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
