<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase;

use Depositphotos\SDK\Resource\Common\Purchase\Request\GetPurchasesRequest;
use Depositphotos\SDK\Resource\Common\Purchase\Request\GetRestrictedSellersRequest;
use Depositphotos\SDK\Resource\Common\Purchase\Response\GetPurchasesResponse;
use Depositphotos\SDK\Resource\Common\Purchase\Response\GetRestrictedSellersResponse;
use Depositphotos\SDK\Resource\Resource;

class PurchaseResource extends Resource
{
    public function getRestrictedSellers(GetRestrictedSellersRequest $request): GetRestrictedSellersResponse
    {
        $httpResponse = $this->send($request);

        return new GetRestrictedSellersResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getPurchases(GetPurchasesRequest $request): GetPurchasesResponse
    {
        $httpResponse = $this->send($request);

        return new GetPurchasesResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
