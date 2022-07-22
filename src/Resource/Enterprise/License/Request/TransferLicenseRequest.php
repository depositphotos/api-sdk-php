<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use Depositphotos\SDK\Resource\Enterprise\License\Request\TransferEnterpriseLicense\LegalInfo;

class TransferLicenseRequest implements RequestInterface
{
    private const COMMAND_NAME = 'transferEnterpriseLicense';

    /** @var string */
    private $sessionId;

    /** @var int[] */
    private $transactionIds;

    /** @var LegalInfo */
    private $from;

    /** @var LegalInfo */
    private $to;

    public function __construct(string $sessionId, array $transactionIds, LegalInfo $from, LegalInfo $to)
    {
        $this->sessionId = $sessionId;
        $this->transactionIds = $transactionIds;
        $this->from = $from;
        $this->to = $to;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getTransactionIds(): array
    {
        return $this->transactionIds;
    }

    public function getFrom(): LegalInfo
    {
        return $this->from;
    }

    public function getTo(): LegalInfo
    {
        return $this->to;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_item_transaction_ids' => $this->getTransactionIds(),
            'dp_from' => $this->from->toArray(),
            'dp_to' => $this->to->toArray(),
        ];
    }
}
