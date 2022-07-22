<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetUserDataRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getUserData';

    /** @var string */
    private $sessionId;

    /** @var null|int */
    private $userId;

    /** @var null|string */
    private $dateTimeFormat;

    public function __construct(string $sessionId, ?int $userId = null, ?string $dateTimeFormat = null)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->dateTimeFormat = $dateTimeFormat;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getDateTimeFormat(): ?string
    {
        return $this->dateTimeFormat;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_user_id' => $this->getUserId(),
            'dp_datetime_format' => $this->getDateTimeFormat(),
        ];
    }
}
