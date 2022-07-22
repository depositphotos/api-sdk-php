<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class UpdateSubAccountRequest implements RequestInterface
{
    private const COMMAND_NAME = 'updateSubaccount';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $subAccountId;

    /** @var null|string */
    private $email;

    /** @var null|string */
    private $firstName;

    /** @var null|string */
    private $lastName;

    /** @var null|string */
    private $company;

    public function __construct(string $sessionId, int $subAccountId)
    {
        $this->sessionId = $sessionId;
        $this->subAccountId = $subAccountId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getSubAccountId(): int
    {
        return $this->subAccountId;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_id' => $this->getSubAccountId(),
            'dp_subaccount_email' => $this->getEmail(),
            'dp_subaccount_fname' => $this->getFirstName(),
            'dp_subaccount_lname' => $this->getLastName(),
            'dp_subaccount_company' => $this->getCompany(),
        ];
    }
}
