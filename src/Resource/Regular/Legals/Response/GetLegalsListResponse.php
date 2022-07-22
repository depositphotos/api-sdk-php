<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Legals\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetLegalsListResponse extends ResponseObject
{
    public function getLegals(): array
    {
        return (array) $this->getProperty('legals');
    }
}
