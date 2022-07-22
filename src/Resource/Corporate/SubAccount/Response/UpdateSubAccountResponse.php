<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class UpdateSubAccountResponse extends ResponseObject
{
    public function getSubAccountId(): int
    {
        return (int) $this->getProperty('subaccountId');
    }
}
