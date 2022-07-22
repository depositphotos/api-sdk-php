<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetIndustryListResponse extends ResponseObject
{
    public function getIndustries(): array
    {
        return (array) $this->getProperty('industries');
    }
}
