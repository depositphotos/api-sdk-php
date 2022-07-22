<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloads;

use Depositphotos\SDK\Resource\ResponseObject;
use DateTimeInterface;

class Download extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getUserId(): int
    {
        return (int) $this->getProperty('userId');
    }

    public function getGroupId(): int
    {
        return (int) $this->getProperty('groupId');
    }

    public function getUpdated(): DateTimeInterface
    {
        return $this->getDateTime('datetime');
    }

    public function getMarker(): int
    {
        return (int) $this->getProperty('marker');
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('option');
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

    public function getDownloadUrl(): string
    {
        return (string) $this->getProperty('download');
    }
}
