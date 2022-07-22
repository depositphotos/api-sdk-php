<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Legals;

use Depositphotos\SDK\Resource\Regular\Legals\Request\GetLegalDocumentRequest;
use Depositphotos\SDK\Resource\Regular\Legals\Request\GetLegalsListRequest;
use Depositphotos\SDK\Resource\Regular\Legals\Response\GetLegalDocumentResponse;
use Depositphotos\SDK\Resource\Regular\Legals\Response\GetLegalsListResponse;
use Depositphotos\SDK\Resource\Resource;

class LegalsResource extends Resource
{
    public function getLegalsList(GetLegalsListRequest $request): GetLegalsListResponse
    {
        $httpResponse = $this->send($request);

        return new GetLegalsListResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getLegalDocument(GetLegalDocumentRequest $request): GetLegalDocumentResponse
    {
        $httpResponse = $this->send($request);

        return new GetLegalDocumentResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
