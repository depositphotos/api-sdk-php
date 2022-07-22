<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common;

use Depositphotos\SDK\Resource\ResponseObject;

class Lightbox extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('lightboxId');
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }

    public function getCreated(): \DateTimeInterface
    {
        return $this->getDateTime('created');
    }

    public function getUpdated(): \DateTimeInterface
    {
        return $this->getDateTime('updated');
    }

    public function isPublic(): bool
    {
        return (bool) $this->getProperty('public');
    }

    public function isShared(): bool
    {
        return (bool) $this->getProperty('isShared');
    }

    public function getKeywords(): string
    {
        return (string) $this->getProperty('keywords');
    }

    public function getLink(): string
    {
        return (string) $this->getProperty('link');
    }

    public function getUserId(): int
    {
        return (int) $this->getProperty('userId');
    }

    public function getUsername(): string
    {
        return (string) $this->getProperty('userName');
    }

    public function getPermission(): string
    {
        return (string) $this->getProperty('permission');
    }

    public function getAllowedActions(): array
    {
        return (array) $this->getProperty('allowedActions');
    }

    public function getItems(): array
    {
        return (array) $this->getProperty('items');
    }
}
