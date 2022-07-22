<?php
declare(strict_types=1);

namespace Depositphotos\SDK;

use Depositphotos\SDK\Resource\Common\Generic\GenericResource;
use Depositphotos\SDK\Resource\Common\Search\SearchResource;
use Depositphotos\SDK\Resource\Enterprise\Item\ItemResource;
use Depositphotos\SDK\Resource\Enterprise\License\LicenseResource;
use Depositphotos\SDK\Resource\Enterprise\Statistics\StatisticsResource;
use Depositphotos\SDK\Resource\Enterprise\User\UserResource;
use Depositphotos\SDK\Resource\Enterprise\Invoice\InvoiceResource;
use Depositphotos\SDK\Resource\Enterprise\Purchase\PurchaseResource;

class EnterpriseClient extends Client
{
    public function generic(): GenericResource
    {
        return new GenericResource($this->httpClient);
    }

    public function item(): ItemResource
    {
        return new ItemResource($this->httpClient);
    }

    public function license(): LicenseResource
    {
        return new LicenseResource($this->httpClient);
    }

    public function user(): UserResource
    {
        return new UserResource($this->httpClient);
    }

    public function invoice(): InvoiceResource
    {
        return new InvoiceResource($this->httpClient);
    }

    public function purchase(): PurchaseResource
    {
        return new PurchaseResource($this->httpClient);
    }

    public function search(): SearchResource
    {
        return new SearchResource($this->httpClient);
    }

    public function statistics(): StatisticsResource
    {
        return new StatisticsResource($this->httpClient);
    }
}
