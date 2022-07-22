<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class CreateSubAccountRequest implements RequestInterface
{
    private const COMMAND_NAME = 'createSubaccount';

    /** @var string */
    private $sessionId;

    /** @var string */
    private $email;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var null|string */
    private $username;

    /** @var null|string */
    private $password;

    public function __construct(
        string $sessionId,
        string $email,
        string $firstName,
        string $lastName,
        ?string $username = null,
        ?string $password = null
    ) {
        $this->sessionId = $sessionId;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_email' => $this->getEmail(),
            'dp_subaccount_fname' => $this->getFirstName(),
            'dp_subaccount_lname' => $this->getLastName(),
            'dp_subaccount_username' => $this->getUsername(),
            'dp_subaccount_password' => $this->getPassword(),
        ];
    }
}
