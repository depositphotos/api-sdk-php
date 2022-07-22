<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetSubAccountPurchasesRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getSubaccountPurchases';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $subAccountId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $datetimeFormat;

    public function __construct(string $sessionId, int $subAccountId, int $limit, int $offset, ?string $datetimeFormat = null)
    {
        $this->sessionId = $sessionId;
        $this->subAccountId = $subAccountId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->datetimeFormat = $datetimeFormat;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getSubAccountId(): int
    {
        return $this->subAccountId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getDatetimeFormat(): ?string
    {
        return $this->datetimeFormat;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_id' => $this->getSubAccountId(),
            'dp_subaccount_limit' => $this->getLimit(),
            'dp_subaccount_offset' => $this->getOffset(),
            'dp_datetime_format' => $this->getDatetimeFormat(),
        ];
    }
}
