<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetInvoiceRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseInvoice';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $invoiceId;

    public function __construct(string $sessionId, int $invoiceId)
    {
        $this->sessionId = $sessionId;
        $this->invoiceId = $invoiceId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_invoice_id' => $this->getInvoiceId(),
        ];
    }
}
