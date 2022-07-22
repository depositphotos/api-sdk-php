<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search;

use Depositphotos\SDK\Resource\Common\Search\Request\GetChangedItemsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetMediaDataRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetRelatedRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetSearchColorsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\GetTagCloudRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\SearchHintsRequest;
use Depositphotos\SDK\Resource\Common\Search\Request\SearchRequest;
use Depositphotos\SDK\Resource\Common\Search\Response\GetChangedItemsResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\GetMediaDataResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\GetRelatedResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\GetSearchColorsResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\GetTagCloudResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\SearchHintsResponse;
use Depositphotos\SDK\Resource\Common\Search\Response\SearchResponse;
use Depositphotos\SDK\Resource\Resource;

class SearchResource extends Resource
{
    public function search(SearchRequest $request): SearchResponse
    {
        $httpResponse = $this->send($request);

        return new SearchResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getChangedItems(GetChangedItemsRequest $request): GetChangedItemsResponse
    {
        $httpResponse = $this->send($request);

        return new GetChangedItemsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getRelated(GetRelatedRequest $request): GetRelatedResponse
    {
        $httpResponse = $this->send($request);

        return new GetRelatedResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSearchColors(GetSearchColorsRequest $request): GetSearchColorsResponse
    {
        $httpResponse = $this->send($request);

        return new GetSearchColorsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function searchHints(SearchHintsRequest $request): SearchHintsResponse
    {
        $httpResponse = $this->send($request);

        return new SearchHintsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getTagCloud(GetTagCloudRequest $request): GetTagCloudResponse
    {
        $httpResponse = $this->send($request);

        return new GetTagCloudResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getMediaData(GetMediaDataRequest $request): GetMediaDataResponse
    {
        $httpResponse = $this->send($request);

        return new GetMediaDataResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
