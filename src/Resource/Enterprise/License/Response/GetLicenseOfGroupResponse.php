<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response;

use Depositphotos\SDK\Resource\Enterprise\License\Response\GetLicenseOfGroup\License;
use Depositphotos\SDK\Resource\ResponseObject;

class GetLicenseOfGroupResponse extends ResponseObject
{
    /**
     * @return License[]
     */
    public function getLicenses(): array
    {
        return (array) $this->getProperty('data', License::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
