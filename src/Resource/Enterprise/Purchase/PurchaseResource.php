<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase;

use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\GetDownloadUrlRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\GetLicensedItemsRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\LicenseItemRequest;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\GetDownloadUrlResponse;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\GetLicensedItemsResponse;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItemResponse;
use Depositphotos\SDK\Resource\Common\Purchase\PurchaseResource as BasePurchaseResource;

class PurchaseResource extends BasePurchaseResource
{
    public function getDownloadUrl(GetDownloadUrlRequest $request): GetDownloadUrlResponse
    {
        $httpResponse = $this->send($request);

        return new GetDownloadUrlResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function licenseItem(LicenseItemRequest $request): LicenseItemResponse
    {
        $httpResponse = $this->send($request);

        return new LicenseItemResponse($this->convertHttpResponseToArray($httpResponse)['result'] ?? []);
    }

    public function getLicensedItems(GetLicensedItemsRequest $request): GetLicensedItemsResponse
    {
        $httpResponse = $this->send($request);

        return new GetLicensedItemsResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
