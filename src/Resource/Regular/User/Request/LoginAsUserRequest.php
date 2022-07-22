<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class LoginAsUserRequest implements RequestInterface
{
    private const COMMAND_NAME = 'loginAsUser';

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_login_user' => $this->getUsername(),
            'dp_login_password' => $this->getPassword(),
        ];
    }
}
