<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice;

use Depositphotos\SDK\Resource\ResponseObject;

class PaymentInstruction extends ResponseObject
{
    public function getKey(): string
    {
        return (string) $this->getProperty('key');
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getProperty('value');
    }
}
