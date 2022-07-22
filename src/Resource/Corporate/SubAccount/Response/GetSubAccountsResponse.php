<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetSubAccountsResponse extends ResponseObject
{
    /**
     * @return int[]
     */
    public function getSubAccounts(): array
    {
        return (array) $this->getProperty('subaccounts');
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
