<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoiceList;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Invoice extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getDate(): DateTimeInterface
    {
        return $this->getDateTime('date');
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function getNumber(): string
    {
        return (string) $this->getProperty('number');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getPrice(): float
    {
        return (float) $this->getProperty('price');
    }

    public function getAmount(): float
    {
        return (float) $this->getProperty('amount');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }

    public function getPaid(): ?DateTimeInterface
    {
        return $this->getDateTimeOrNull('paymentDate');
    }

    public function isProforma(): bool
    {
        return (bool) $this->getProperty('isProforma');
    }
}
