<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetTransactionLicenseInfoRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getTransactionLicenseInfo';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $transactionId;

    public function __construct(string $sessionId, int $transactionId)
    {
        $this->sessionId = $sessionId;
        $this->transactionId = $transactionId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getTransactionId(): int
    {
        return $this->transactionId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_transaction_id' => $this->getTransactionId(),
        ];
    }
}
