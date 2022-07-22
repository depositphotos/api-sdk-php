<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Request\TransferEnterpriseLicense;

class LegalInfo
{
    /** @var string */
    private $company;

    /** @var null|string */
    private $fullName;

    /** @var null|string */
    private $address;

    /** @var null|string */
    private $city;

    /** @var null|string */
    private $state;

    /** @var null|string */
    private $zip;

    /** @var null|string */
    private $email;

    /** @var null|string */
    private $phone;

    /** @var null|string */
    private $country;

    /** @var null|string */
    private $website;

    /** @var null|string */
    private $ein;

    /** @var null|string */
    private $vat;

    /** @var null|string */
    private $countryName;

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

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

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getEin(): ?string
    {
        return $this->ein;
    }

    public function setEin(?string $ein): self
    {
        $this->ein = $ein;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->vat;
    }

    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(?string $countryName): self
    {
        $this->countryName = $countryName;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'company' => $this->getCompany(),
            'full_name' => $this->getFullName(),
            'address' => $this->getAddress(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'zip' => $this->getZip(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'country' => $this->getCountry(),
            'website' => $this->getWebsite(),
            'ein' => $this->getEin(),
            'vat' => $this->getVat(),
            'country_name' => $this->getCountryName(),
        ];
    }
}
