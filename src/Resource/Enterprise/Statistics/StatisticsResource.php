<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics;

use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetItemStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetTotalStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetItemStatisticsResponse;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetStatisticsResponse;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Response\GetTotalStatisticsResponse;
use Depositphotos\SDK\Resource\Resource;

class StatisticsResource extends Resource
{
    public function getStatistics(GetStatisticsRequest $request): GetStatisticsResponse
    {
        $httpResponse = $this->send($request);

        return new GetStatisticsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getItemStatistics(GetItemStatisticsRequest $request): GetItemStatisticsResponse
    {
        $httpResponse = $this->send($request);

        return new GetItemStatisticsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getTotalStatistics(GetTotalStatisticsRequest $request): GetTotalStatisticsResponse
    {
        $httpResponse = $this->send($request);

        return new GetTotalStatisticsResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
