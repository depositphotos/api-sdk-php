<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo;

use Depositphotos\SDK\Resource\ResponseObject;

class Item extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getFilename(): string
    {
        return (string) $this->getProperty('filename');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function isEditorial(): bool
    {
        return (bool) $this->getProperty('isEditorial');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('isNudity');
    }

    public function getPreview(): string
    {
        return (string) $this->getProperty('preview');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }
}
