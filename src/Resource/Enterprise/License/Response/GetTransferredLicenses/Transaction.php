<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransferredLicenses;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Transaction extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('itemTransactionId');
    }

    public function getLicenseTransferId(): ?int
    {
        return (int) $this->getProperty('licenseTransferId');
    }

    public function getUserId(): int
    {
        return (int) $this->getProperty('userId');
    }

    public function getGroupId(): int
    {
        return (int) $this->getProperty('groupId');
    }

    public function getLicenseId(): int
    {
        return (int) $this->getProperty('licenseId');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getCurrencyId(): int
    {
        return (int) $this->getProperty('currencyId');
    }

    public function getCreated(): DateTimeInterface
    {
        return $this->getDateTime('datetime');
    }

    public function getMarker(): int
    {
        return (int) $this->getProperty('marker');
    }

    public function getItem(): Item
    {
        /** @var Item $item */
        $item = $this->cast(Item::class);

        return $item;
    }

    public function getActor(): User
    {
        return $this->getProperty('actor', User::class);
    }

    public function getSeller(): User
    {
        return $this->getProperty('seller', User::class);
    }

    public function getProject(): ?string
    {
        return $this->getProperty('project');
    }

    public function getClient(): ?string
    {
        return $this->getProperty('client');
    }

    public function getPurchaseOrder(): ?string
    {
        return $this->getProperty('purchaseOrder');
    }

    public function getIsbn(): ?string
    {
        return $this->getProperty('isbn');
    }

    public function getOther(): ?string
    {
        return $this->getProperty('other');
    }
}
