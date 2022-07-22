<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetUserDataRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseUserData';

    /** @var string */
    private $sessionId;

    /** @var null|int */
    private $userId;

    public function __construct(string $sessionId, ?int $userId = null)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_user_id' => $this->getUserId(),
        ];
    }
}
