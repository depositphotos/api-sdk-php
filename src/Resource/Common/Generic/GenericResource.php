<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic;

use Depositphotos\SDK\Resource\Common\Generic\Request\GetInfoRequest;
use Depositphotos\SDK\Resource\Common\Generic\Request\HelpRequest;
use Depositphotos\SDK\Resource\Common\Generic\Response\GetInfoResponse;
use Depositphotos\SDK\Resource\Common\Generic\Response\HelpResponse;
use Depositphotos\SDK\Resource\Resource;

class GenericResource extends Resource
{
    public function getInfo(GetInfoRequest $request): GetInfoResponse
    {
        $httpResponse = $this->send($request);

        return new GetInfoResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function help(HelpRequest $request): HelpResponse
    {
        $httpResponse = $this->send($request);

        return new HelpResponse($this->convertHttpResponseToArray($httpResponse)['help'] ?? []);
    }
}
