<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransferredLicenses;

use Depositphotos\SDK\Resource\ResponseObject;

class Item extends ResponseObject
{
    public function cast(string $class): ResponseObject
    {
        switch ($this->data['itemType'] ?? null) {
            case 'audio':
                return new Audio($this->data);
            default:
                return parent::cast($class);
        }
    }

    public function getId(): int
    {
        return (int) $this->getProperty('itemId');
    }

    public function getFileName(): string
    {
        return (string) $this->getProperty('filename');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('itemType');
    }

    public function isEditorial(): bool
    {
        return (bool) $this->getProperty('editorial');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getPreview(): string
    {
        return (string) $this->getProperty('preview');
    }

    public function getItemUrl(): string
    {
        return (string) $this->getProperty('itemLink');
    }

    public function isVisible(): bool
    {
        return (bool) $this->getProperty('visible');
    }
}
