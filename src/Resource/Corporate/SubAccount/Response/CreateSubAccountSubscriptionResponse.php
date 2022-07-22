<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class CreateSubAccountSubscriptionResponse extends ResponseObject
{
    public function getProductId(): int
    {
        return (int) $this->getProperty('product_id');
    }
}
