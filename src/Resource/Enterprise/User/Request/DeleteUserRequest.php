<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class DeleteUserRequest implements RequestInterface
{
    private const COMMAND_NAME = 'deleteEnterpriseUser';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $userId;

    public function __construct(string $sessionId, int $userId)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): int
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
