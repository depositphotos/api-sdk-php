<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class ChangePasswordRequest implements RequestInterface
{
    private const COMMAND_NAME = 'changePassword';

    /** @var string */
    private $sessionId;

    /** @var string */
    private $oldPassword;

    /** @var string */
    private $newPassword;

    public function __construct(string $sessionId, string $oldPassword, string $newPassword)
    {
        $this->sessionId = $sessionId;
        $this->oldPassword = $oldPassword;
        $this->newPassword = $newPassword;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
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
            'dp_old_password' => $this->getOldPassword(),
            'dp_new_password' => $this->getNewPassword(),
        ];
    }
}
