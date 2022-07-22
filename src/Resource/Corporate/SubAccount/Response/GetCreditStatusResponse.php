<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetCreditStatusResponse extends ResponseObject
{
    public function getCreditsAmount(): float
    {
        return (float) $this->getProperty('creditsAmount');
    }

    public function getSubscriptionAmount(): int
    {
        return (int) $this->getProperty('subscriptionAmount');
    }

    public function getInvoiceAmount(): int
    {
        return (int) $this->getProperty('invoiceAmount');
    }

    public function getFilesAmount(): int
    {
        return (int) $this->getProperty('filesAmount');
    }
}
