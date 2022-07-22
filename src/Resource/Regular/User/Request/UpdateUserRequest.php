<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class UpdateUserRequest implements RequestInterface
{
    private const COMMAND_NAME = 'updateUser';

    /** @var string */
    private $sessionId;

    /** @var null|string */
    private $email;

    /** @var null|string */
    private $firstName;

    /** @var null|string */
    private $lastName;

    /** @var null|string */
    private $username;

    /** @var null|string */
    private $gender;

    /** @var null|string */
    private $address;

    /** @var null|string */
    private $city;

    /** @var null|string */
    private $state;

    /** @var null|string */
    private $zip;

    /** @var null|string */
    private $country;

    /** @var null|string */
    private $timezone;

    /** @var null|string */
    private $phone;

    /** @var null|string */
    private $news;

    /** @var null|string */
    private $company;

    /** @var null|string */
    private $businessName;

    /** @var null|string */
    private $businessPhone;

    /** @var null|string */
    private $website;

    /** @var null|string */
    private $facebook;

    /** @var null|string */
    private $occupation;

    /** @var null|string */
    private $biography;

    /** @var null|string */
    private $industry;

    public function __construct(string $sessionId)
    {
        $this->sessionId = $sessionId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getNews(): ?string
    {
        return $this->news;
    }

    public function setNews(?string $news): void
    {
        $this->news = $news;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    public function setBusinessName(?string $businessName): void
    {
        $this->businessName = $businessName;
    }

    public function getBusinessPhone(): ?string
    {
        return $this->businessPhone;
    }

    public function setBusinessPhone(?string $businessPhone): void
    {
        $this->businessPhone = $businessPhone;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): void
    {
        $this->occupation = $occupation;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): void
    {
        $this->biography = $biography;
    }

    public function getIndustry(): ?string
    {
        return $this->industry;
    }

    public function setIndustry(?string $industry): void
    {
        $this->industry = $industry;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_email' => $this->getEmail(),
            'dp_first_name' => $this->getFirstName(),
            'dp_last_name' => $this->getLastName(),
            'dp_username' => $this->getUsername(),
            'dp_gender' => $this->getGender(),
            'dp_address' => $this->getAddress(),
            'dp_city' => $this->getCity(),
            'dp_state' => $this->getState(),
            'dp_country' => $this->getCountry(),
            'dp_zip' => $this->getZip(),
            'dp_timezone' => $this->getTimezone(),
            'dp_phone' => $this->getPhone(),
            'dp_news' => $this->getNews(),
            'dp_company' => $this->getCompany(),
            'dp_business_name' => $this->getBusinessName(),
            'dp_business_phone' => $this->getBusinessPhone(),
            'dp_website' => $this->getWebsite(),
            'dp_facebook' => $this->getFacebook(),
            'dp_occupation' => $this->getOccupation(),
            'dp_biography' => $this->getBiography(),
            'dp_industry' => $this->getIndustry(),
        ];
    }
}
