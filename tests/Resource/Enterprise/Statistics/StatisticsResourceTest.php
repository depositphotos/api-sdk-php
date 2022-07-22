<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\Statistics;

use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetItemStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\Request\GetTotalStatisticsRequest;
use Depositphotos\SDK\Resource\Enterprise\Statistics\StatisticsResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class StatisticsResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetStatistics(): void
    {
        $this->loadFixtures('commands.enterprise.statistics.getEnterpriseStatisticsDates');

        $resource = new StatisticsResource($this->createHttpClient());
        $result = $resource->getStatistics(new GetStatisticsRequest(
            $this->getFixture('request.dp_session_id'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            new \DateTime($this->getFixture('request.dp_date_end')),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_group_id'),
            $this->getFixture('request.dp_user_id')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getStatistics() as $key => $statistics) {
            $fixture = $this->getFixture('response.data')[$key];

            $this->assertEquals($fixture['comps'], $statistics->getComps());
            $this->assertEquals($fixture['licensed'], $statistics->getLicensed());
            $this->assertEquals($fixture['transferred'], $statistics->getTransferred());
            $this->assertEquals($fixture['title'], $statistics->getTitle());
        }
    }

    public function testGetItemStatistics(): void
    {
        $this->loadFixtures('commands.enterprise.statistics.getEnterpriseStatisticsItems');

        $resource = new StatisticsResource($this->createHttpClient());
        $result = $resource->getItemStatistics(new GetItemStatisticsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            new \DateTime($this->getFixture('request.dp_date_end')),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset')
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());

        foreach ($result->getStatistics() as $key => $statistics) {
            $fixture = $this->getFixture('response.data')[$key];

            $this->assertEquals($fixture['comps'], $statistics->getComps());
            $this->assertEquals($fixture['licenses'], $statistics->getLicenses());
            $this->assertEquals($fixture['transfers'], $statistics->getTransfers());
            $this->assertEquals($fixture['id'], $statistics->getId());
            $this->assertEquals($fixture['blocked'], $statistics->isBlocked());
            $this->assertEquals($fixture['height'], $statistics->getHeight());
            $this->assertEquals($fixture['width'], $statistics->getWidth());
            $this->assertEquals($fixture['type'], $statistics->getType());
            $this->assertEquals($fixture['title'], $statistics->getTitle());
            $this->assertEquals($fixture['description'], $statistics->getDescription());
            $this->assertEquals($fixture['filename'], $statistics->getFilename());
            $this->assertEquals($fixture['sellerId'], $statistics->getSellerId());
            $this->assertEquals($fixture['sellerName'], $statistics->getSellerName());
            $this->assertEquals($fixture['editorial'], $statistics->isEditorial());
            $this->assertEquals($fixture['mp'], $statistics->getMp());
            $this->assertEquals($fixture['uploadTimestamp'], $statistics->getUploaded()->getTimestamp());
            $this->assertEquals($fixture['nudity'], $statistics->isNudity());
        }
    }

    public function testGetTotalStatistics(): void
    {
        $this->loadFixtures('commands.enterprise.statistics.getEnterpriseStatisticsTotal');

        $resource = new StatisticsResource($this->createHttpClient());
        $result = $resource->getTotalStatistics(new GetTotalStatisticsRequest(
            $this->getFixture('request.dp_session_id'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            new \DateTime($this->getFixture('request.dp_date_end')),
            $this->getFixture('request.dp_group_id'),
            $this->getFixture('request.dp_user_id')
        ));

        $this->assertEquals($this->getFixture('response.comps'), $result->getComps());
        $this->assertEquals($this->getFixture('response.licensed'), $result->getLicensed());
        $this->assertEquals($this->getFixture('response.transferred'), $result->getTransferred());
    }
}
