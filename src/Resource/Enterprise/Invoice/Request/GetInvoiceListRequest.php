<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Invoice\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetInvoiceListRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseInvoiceList';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $state;

    public function __construct(string $sessionId, int $limit, int $offset = 0, ?string $state = null)
    {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->state = $state;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_state' => $this->getState(),
        ];
    }
}
