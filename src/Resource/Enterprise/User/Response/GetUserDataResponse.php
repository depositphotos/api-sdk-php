<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\User;
use DateTimeInterface;

class GetUserDataResponse extends User
{
    public function getCountry(): string
    {
        return (string) $this->getProperty('country');
    }

    public function getTimezone(): ?string
    {
        return $this->getProperty('timezone');
    }

    public function getBusinessName(): ?string
    {
        return $this->getProperty('businessName');
    }

    public function getBusinessPhone(): ?string
    {
        return $this->getProperty('businessPhone');
    }

    public function getWebsite(): ?string
    {
        return $this->getProperty('website');
    }

    public function getBiography(): ?string
    {
        return $this->getProperty('biography');
    }

    public function getIndustry(): ?string
    {
        return $this->getProperty('industry');
    }

    public function getVatNumber(): ?string
    {
        return $this->getProperty('vatNumber');
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->getDateTimeOrNull('createdAt');
    }

    public function getEquipment(): ?string
    {
        return $this->getProperty('equipment');
    }

    public function getFacebook(): ?string
    {
        return $this->getProperty('facebook');
    }

    public function getGoogle(): ?string
    {
        return $this->getProperty('google');
    }

    public function getCompany(): ?string
    {
        return $this->getProperty('company');
    }

    public function getFilesAmount(): ?int
    {
        $filesAmount = $this->getProperty('filesAmount');

        return is_numeric($filesAmount) ? (int) $filesAmount : null;
    }
}
