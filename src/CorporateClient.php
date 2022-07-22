<?php
declare(strict_types=1);

namespace Depositphotos\SDK;

use Depositphotos\SDK\Resource\Corporate\SubAccount\SubAccountResource;

class CorporateClient extends RegularClient
{
    public function subAccount(): SubAccountResource
    {
        return new SubAccountResource($this->httpClient);
    }
}
