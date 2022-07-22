<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class AvailableFundsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'availableFunds';

    /** @var string */
    private $sessionId;

    /** @var null|string */
    private $datetimeFormat;

    public function __construct(string $sessionId, ?string $datetimeFormat = null)
    {
        $this->sessionId = $sessionId;
        $this->datetimeFormat = $datetimeFormat;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
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
            'dp_datetime_format' => $this->getDatetimeFormat(),
        ];
    }
}
