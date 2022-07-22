<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class UpdateUserRequest implements RequestInterface
{
    private const COMMAND_NAME = 'updateEnterpriseUser';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $userId;

    /** @var string */
    private $email;

    /** @var null|string */
    private $firstName;

    /** @var null|string */
    private $lastName;

    /** @var null|string */
    private $country;

    /** @var null|string */
    private $city;

    /** @var null|string */
    private $state;

    /** @var null|string */
    private $address;

    /** @var null|string */
    private $zip;

    /** @var null|string */
    private $phone;

    /** @var null|string */
    private $occupation;

    public function __construct(string $sessionId, int $userId, string $email)
    {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->email = $email;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getEmail(): string
    {
        return $this->email;
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

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
            'dp_user_id' => $this->getUserId(),
            'dp_email' => $this->getEmail(),
            'dp_first_name' => $this->getFirstName(),
            'dp_last_name' => $this->getLastName(),
            'dp_country' => $this->getCountry(),
            'dp_city' => $this->getCity(),
            'dp_state' => $this->getState(),
            'dp_address' => $this->getAddress(),
            'dp_zip' => $this->getZip(),
            'dp_phone' => $this->getPhone(),
            'dp_occupation' => $this->getOccupation(),
        ];
    }
}
