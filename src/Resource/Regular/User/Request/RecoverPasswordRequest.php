<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class RecoverPasswordRequest implements RequestInterface
{
    private const COMMAND_NAME = 'recoverPassword';

    /** @var string */
    private $username;

    /** @var string */
    private $email;

    public function __construct(string $username, string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(sprintf('Email address "%s" is invalid', $email));
        }

        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_login_user' => $this->getUsername(),
            'dp_login_email' => $this->getEmail(),
        ];
    }
}
