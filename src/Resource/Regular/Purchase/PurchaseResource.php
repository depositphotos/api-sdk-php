<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Purchase;

use Depositphotos\SDK\Resource\Regular\Purchase\Request\GetMediaRequest;
use Depositphotos\SDK\Resource\Regular\Purchase\Request\ReDownloadRequest;
use Depositphotos\SDK\Resource\Regular\Purchase\Response\GetMediaResponse;
use Depositphotos\SDK\Resource\Regular\Purchase\Response\ReDownloadResponse;
use Depositphotos\SDK\Resource\Common\Purchase\PurchaseResource as BasePurchaseResource;

class PurchaseResource extends BasePurchaseResource
{
    public function getMedia(GetMediaRequest $request): GetMediaResponse
    {
        $httpResponse = $this->send($request);

        return new GetMediaResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function reDownload(ReDownloadRequest $request): ReDownloadResponse
    {
        $httpResponse = $this->send($request);

        return new ReDownloadResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
