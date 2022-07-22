<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class ComplimentaryDownloadResponse extends ResponseObject
{
    public function getDownloadUrl(): string
    {
        return (string) $this->getProperty('downloadLink');
    }
}
