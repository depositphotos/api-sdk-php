<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice;

use Depositphotos\SDK\Resource\ResponseObject;

class LicenseInfo extends ResponseObject
{
    public function getKey(): string
    {
        return (string) $this->getProperty('key');
    }

    public function getValue(): string
    {
        return (string) $this->getProperty('value');
    }
}
