<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetDownloadUrlResponse extends ResponseObject
{
    public function getDownloadUrl(): string
    {
        return (string) $this->getProperty('downloadLink');
    }
}
