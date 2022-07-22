<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class ChangePasswordRequest implements RequestInterface
{
    private const COMMAND_NAME = 'changePasswordEnterpriseUserByAdmin';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $userId;

    /** @var string */
    private $newPassword;

    public function __construct(string $sessionId, int $userId, string $newPassword)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->newPassword = $newPassword;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_user_id' => $this->getUserId(),
            'dp_new_password' => $this->getNewPassword(),
        ];
    }
}
