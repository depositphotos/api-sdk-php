<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item;

use Depositphotos\SDK\Resource\Enterprise\Item\Request\ComplimentaryDownloadRequest;
use Depositphotos\SDK\Resource\Enterprise\Item\Request\GetGroupCompDownloadsRequest;
use Depositphotos\SDK\Resource\Enterprise\Item\Response\ComplimentaryDownloadResponse;
use Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloadsResponse;
use Depositphotos\SDK\Resource\Common\Item\ItemResource as BaseItemResource;

class ItemResource extends BaseItemResource
{
    public function complimentaryDownload(ComplimentaryDownloadRequest $request): ComplimentaryDownloadResponse
    {
        $httpResponse = $this->send($request);

        return new ComplimentaryDownloadResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getGroupCompDownloads(GetGroupCompDownloadsRequest $request): GetGroupCompDownloadsResponse
    {
        $httpResponse = $this->send($request);

        return new GetGroupCompDownloadsResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
