<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class SetPermissionsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'setEnterprisePermissions';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $userId;

    /** @var string */
    private $permission;

    /** @var bool */
    private $state;

    public function __construct(string $sessionId, int $userId, string $permission, bool $state)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->permission = $permission;
        $this->state = $state;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }

    public function getState(): bool
    {
        return $this->state;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_user_id' => $this->getUserId(),
            'dp_permission' => $this->getPermission(),
            'dp_state' => $this->getState(),
        ];
    }
}
