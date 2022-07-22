<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class RegisterSubAccountRequest implements RequestInterface
{
    private const COMMAND_NAME = 'registerEnterpriseSubaccount';

    /** @var string */
    private $sessionId;

    /** @var string */
    private $username;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var null|int */
    private $groupId;

    /** @var null|string */
    private $firstName;

    /** @var null|string */
    private $lastName;

    /** @var null|string */
    private $phone;

    /** @var null|string */
    private $occupation;

    public function __construct(string $sessionId, string $username, string $email, string $password, ?int $groupId = null)
    {
        $this->sessionId = $sessionId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->groupId = $groupId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_regist_user' => $this->getUsername(),
            'dp_regist_email' => $this->getEmail(),
            'dp_regist_password' => $this->getPassword(),
            'dp_group_id' => $this->getGroupId(),
            'dp_user_info' => [
                'firstName' => $this->getFirstName(),
                'lastName' => $this->getLastName(),
                'phone' => $this->getPhone(),
                'occupation' => $this->getOccupation(),
            ],
        ];
    }
}
