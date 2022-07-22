<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response\Common;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class User extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('userId');
    }

    public function getUsername(): string
    {
        return (string) $this->getProperty('username');
    }

    public function getFirstName(): string
    {
        return (string) $this->getProperty('firstName');
    }

    public function getLastName(): string
    {
        return (string) $this->getProperty('lastName');
    }

    public function getState(): ?string
    {
        return $this->getProperty('state');
    }

    public function getCity(): string
    {
        return (string) $this->getProperty('city');
    }

    public function getAddress(): ?string
    {
        return $this->getProperty('address');
    }

    public function getZip(): ?string
    {
        return $this->getProperty('zip');
    }

    public function getAvatarBig(): ?string
    {
        return $this->getProperty('avatarBig');
    }

    public function getAvatarSmall(): ?string
    {
        return $this->getProperty('avatarSmall');
    }

    public function getAvatar(): ?string
    {
        return $this->getProperty('avatar');
    }

    public function getOccupation(): ?string
    {
        return $this->getProperty('occupation');
    }

    public function getEnterpriseLite(): array
    {
        return (array) $this->getProperty('enterpriseLite');
    }

    public function getRegistered(): DateTimeInterface
    {
        return $this->getDateTime('registered');
    }

    public function getEmail(): string
    {
        return (string) $this->getProperty('email');
    }

    public function getPhone(): ?string
    {
        return $this->getProperty('phone');
    }
}
