<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Response;

use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\Balance;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\Item;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\LegalInfo;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\PaymentInstruction;
use Depositphotos\SDK\Resource\Enterprise\Invoice\Response\GetInvoice\Tax;
use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class GetInvoiceResponse extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    /**
     * @return Item[]|Balance[]
     */
    public function getItems(): array
    {
        if ($this->data['type'] === 'file_invoice') {
            return (array) $this->getProperty('items', Item::class);
        }

        if ($this->data['type'] === 'balance_refill') {
            return (array) $this->getProperty('items', Balance::class);
        }

        return [];
    }

    public function getState(): string
    {
        return (string) $this->getProperty('state');
    }

    public function getTotal(): float
    {
        return (float) $this->getProperty('total');
    }

    public function getVat(): float
    {
        return (float) $this->getProperty('vat');
    }

    public function getTax(): Tax
    {
        return $this->getProperty('tax', Tax::class);
    }

    public function getSubTotal(): float
    {
        return (float) $this->getProperty('subTotal');
    }

    public function getNumber(): string
    {
        return (string) $this->getProperty('number');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getDate(): DateTimeInterface
    {
        return $this->getDateTime('date');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }

    public function getFrom(): LegalInfo
    {
        return $this->getProperty('from', LegalInfo::class);
    }

    public function getTo(): LegalInfo
    {
        return $this->getProperty('to', LegalInfo::class);
    }

    /**
     * @return PaymentInstruction[]
     */
    public function getPaymentInstructions(): array
    {
        return (array) $this->getProperty('paymentInstructions', PaymentInstruction::class);
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function isProforma(): bool
    {
        return (bool) $this->getProperty('isProforma');
    }

    public function getPaid(): ?DateTimeInterface
    {
        return $this->getDateTimeOrNull('paid');
    }
}
