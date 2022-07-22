<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Purchase\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetMediaResponse extends ResponseObject
{
    public function getDownloadLink(): string
    {
        return (string) $this->getProperty('downloadLink');
    }

    public function getLicenseId(): string
    {
        return (string) $this->getProperty('licenseId');
    }

    public function getMethod(): string
    {
        return (string) $this->getProperty('method');
    }

    public function getItemId(): int
    {
        return (int) $this->getProperty('itemId');
    }

    public function getSize(): string
    {
        return (string) $this->getProperty('option');
    }
}
