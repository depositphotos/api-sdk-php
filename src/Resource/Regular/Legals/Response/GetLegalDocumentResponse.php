<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Legals\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetLegalDocumentResponse extends ResponseObject
{
    public function getDocument(): string
    {
        return (string) $this->getProperty('document');
    }
}
