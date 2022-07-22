<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Response;

use Depositphotos\SDK\Resource\Regular\User\Response\GetUserData\Subscription;
use Depositphotos\SDK\Resource\ResponseObject;

class GetUserDataResponse extends ResponseObject
{
    public function getUsername(): string
    {
        return (string) $this->getProperty('username');
    }

    public function getBalance(): float
    {
        return (float) $this->getProperty('balance');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getTimezone(): string
    {
        return (string) $this->getProperty('timezone');
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->getDateTime('createdAt');
    }

    public function getCountry(): string
    {
        return (string) $this->getProperty('country');
    }

    public function getState(): string
    {
        return (string) $this->getProperty('state');
    }

    public function getCity(): string
    {
        return (string) $this->getProperty('city');
    }

    public function getAddress(): string
    {
        return (string) $this->getProperty('address');
    }

    public function getZip(): string
    {
        return (string) $this->getProperty('zip');
    }

    public function getEmail(): string
    {
        return (string) $this->getProperty('email');
    }

    public function getFirstName(): string
    {
        return (string) $this->getProperty('firstName');
    }

    public function getLastName(): string
    {
        return (string) $this->getProperty('lastName');
    }

    public function getGender(): string
    {
        return (string) $this->getProperty('gender');
    }

    public function getPhone(): string
    {
        return (string) $this->getProperty('phone');
    }

    public function getFacebook(): string
    {
        return (string) $this->getProperty('facebook');
    }

    public function getNews(): string
    {
        return (string) $this->getProperty('news');
    }

    public function getBusinessName(): ?string
    {
        return $this->getProperty('businessName');
    }

    public function getCompany(): ?string
    {
        return $this->getProperty('company');
    }

    public function getAvatar(): ?string
    {
        return $this->getProperty('avatar');
    }

    public function getWebsite(): ?string
    {
        return $this->getProperty('website');
    }

    public function getBiography(): ?string
    {
        return $this->getProperty('biography');
    }

    public function getBusinessPhone(): ?string
    {
        return $this->getProperty('businessPhone');
    }

    public function getCreditsAmount(): ?float
    {
        $creditsAmount = $this->getProperty('creditsAmount');

        return is_numeric($creditsAmount) ? (float) $creditsAmount : null;
    }

    public function getFilesAmount(): ?int
    {
        $filesAmount = $this->getProperty('filesAmount');

        return is_numeric($filesAmount) ? (int) $filesAmount : null;
    }

    public function getInvoiceAmount(): ?int
    {
        $invoiceAmount = $this->getProperty('invoiceAmount');

        return is_numeric($invoiceAmount) ? (int) $invoiceAmount : null;
    }

    public function getOccupation(): ?string
    {
        return $this->getProperty('occupation');
    }

    public function getVatNumber(): ?string
    {
        return $this->getProperty('vatNumber');
    }

    public function getIndustry(): ?string
    {
        return $this->getProperty('industry');
    }

    public function getEquipment(): ?string
    {
        return $this->getProperty('equipment');
    }

    public function getNotifySales(): ?string
    {
        return $this->getProperty('notifySales');
    }

    public function getNotifySelection(): ?string
    {
        return $this->getProperty('notifySelection');
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return (array) $this->getProperty('subscriptions', Subscription::class);
    }
}
