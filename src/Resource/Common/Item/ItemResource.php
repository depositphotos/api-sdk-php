<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Item;

use Depositphotos\SDK\Resource\Common\Item\Request\CheckItemsStatusRequest;
use Depositphotos\SDK\Resource\Common\Item\Response\CheckItemsStatusResponse;
use Depositphotos\SDK\Resource\Resource;

class ItemResource extends Resource
{
    public function checkItemsStatus(CheckItemsStatusRequest $request): CheckItemsStatusResponse
    {
        $httpResponse = $this->send($request);

        return new CheckItemsStatusResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
