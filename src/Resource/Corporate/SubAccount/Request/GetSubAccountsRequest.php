<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetSubAccountsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getSubaccounts';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    public function __construct(string $sessionId, int $limit, int $offset = 0)
    {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
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

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_limit' => $this->getLimit(),
            'dp_subaccount_offset' => $this->getOffset(),
        ];
    }
}
