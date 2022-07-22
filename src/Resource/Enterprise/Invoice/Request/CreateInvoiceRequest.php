<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class CreateInvoiceRequest implements RequestInterface
{
    private const COMMAND_NAME = 'createEnterpriseInvoice';

    /** @var string */
    private $sessionId;

    /** @var int[] */
    private $itemTransactionIds;

    /** @var null|string */
    private $fieldValue;

    public function __construct(string $sessionId, array $itemTransactionIds, ?string $fieldValue = null)
    {
        $this->sessionId = $sessionId;
        $this->itemTransactionIds = $itemTransactionIds;
        $this->fieldValue = $fieldValue;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getItemTransactionIds(): array
    {
        return $this->itemTransactionIds;
    }

    public function getFieldValue(): ?string
    {
        return $this->fieldValue;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_item_transaction_ids' => $this->getItemTransactionIds(),
            'dp_field_value' => $this->getFieldValue(),
        ];
    }
}
