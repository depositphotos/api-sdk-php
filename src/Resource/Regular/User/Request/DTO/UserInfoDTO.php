<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request\DTO;

class UserInfoDTO
{
    /** @var null|string */
    private $username;

    /** @var null|string */
    private $firstName;

    /** @var null|string */
    private $lastName;

    /** @var null|string */
    private $email;

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

    /** @var null|string */
    private $gender;

    /** @var null|string */
    private $company;

    /** @var null|string */
    private $businessType;

    /** @var null|string */
    private $business;

    /** @var null|string */
    private $website;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

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

    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }

    public function setBusinessType(?string $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }

    public function getBusiness(): ?string
    {
        return $this->business;
    }

    public function setBusiness(?string $business): self
    {
        $this->business = $business;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->getUsername(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->getEmail(),
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'address' => $this->getAddress(),
            'zip' => $this->getZip(),
            'phone' => $this->getPhone(),
            'occupation' => $this->getOccupation(),
            'gender' => $this->getGender(),
            'company' => $this->getCompany(),
            'businessType' => $this->getBusinessType(),
            'business' => $this->getBusiness(),
            'website' => $this->getWebsite(),
        ];
    }
}
