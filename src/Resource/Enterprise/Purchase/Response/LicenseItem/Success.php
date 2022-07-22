<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem;

use Depositphotos\SDK\Resource\ResponseObject;

class Success extends ResponseObject
{
    public function getItemId(): int
    {
        return (int) $this->getProperty('fileId');
    }

    public function getDownloadUrl(): string
    {
        return (string) $this->getProperty('downloadLink');
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->getProperty('transaction', Transaction::class);
    }
}
