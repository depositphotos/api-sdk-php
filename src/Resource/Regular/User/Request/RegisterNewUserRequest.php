<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use Depositphotos\SDK\Resource\Regular\User\Request\DTO\UserInfoDTO;

class RegisterNewUserRequest implements RequestInterface
{
    private const COMMAND_NAME = 'registerNewUser';

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $email;

    /** @var null|UserInfoDTO */
    private $userInfo;

    public function __construct(string $username, string $password, string $email, UserInfoDTO $userInfo = null)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(sprintf('Email address "%s" is invalid', $email));
        }

        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->userInfo = $userInfo;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserInfo(): ?UserInfoDTO
    {
        return $this->userInfo;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_regist_user' => $this->getUsername(),
            'dp_regist_email' => $this->getEmail(),
            'dp_regist_password' => $this->getPassword(),
            'dp_user_info' => $this->getUserInfo() ? $this->getUserInfo()->toArray() : [],
        ];
    }
}
