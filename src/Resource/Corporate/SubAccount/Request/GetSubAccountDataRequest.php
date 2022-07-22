<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetSubAccountDataRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getSubaccountData';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $subAccountId;

    /** @var null|string */
    private $datetimeFormat;

    public function __construct(string $sessionId, int $subAccountId, ?string $datetimeFormat = null)
    {
        $this->sessionId = $sessionId;
        $this->subAccountId = $subAccountId;
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
            'dp_datetime_format' => $this->getDatetimeFormat(),
        ];
    }
}
