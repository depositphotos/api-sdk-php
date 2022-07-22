<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools;

use Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg\File;
use Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBgRequest;
use Depositphotos\SDK\Resource\Regular\Tools\Response\RemoveBgResponse;
use Depositphotos\SDK\Resource\Resource;

class ToolsResource extends Resource
{
    public function removeBg(RemoveBgRequest $request): RemoveBgResponse
    {
        $httpResponse = $this->send($request, [
            'multipart' => $request->getImage() instanceof File
        ]);

        return new RemoveBgResponse(
            $httpResponse->getBody(),
            $httpResponse->getHeaderLine('Content-Type'),
            (int) $httpResponse->getHeaderLine('X-Width'),
            (int) $httpResponse->getHeaderLine('X-Height')
        );
    }
}
