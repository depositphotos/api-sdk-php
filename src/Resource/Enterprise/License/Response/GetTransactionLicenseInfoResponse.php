<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\License\Response;

use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo\Item;
use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo\LegalInfo;
use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo\License;
use Depositphotos\SDK\Resource\Enterprise\License\Response\GetTransactionLicenseInfo\Transaction;
use Depositphotos\SDK\Resource\ResponseObject;

class GetTransactionLicenseInfoResponse extends ResponseObject
{
    public function getLicense(): License
    {
        return $this->getProperty('license', License::class);
    }

    public function getTransaction(): Transaction
    {
        return $this->getProperty('transaction', Transaction::class);
    }

    public function getItem(): Item
    {
        return $this->getProperty('item', Item::class);
    }

    public function getFrom(): LegalInfo
    {
        return $this->getProperty('from', LegalInfo::class);
    }

    public function getTo(): LegalInfo
    {
        return $this->getProperty('to', LegalInfo::class);
    }

    public function getTransferredTo(): ?LegalInfo
    {
        $legalInfo = $this->getProperty('transferredTo', LegalInfo::class);

        return $legalInfo instanceof LegalInfo ? $legalInfo : null;
    }
}
