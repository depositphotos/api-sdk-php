<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\Item;

use Depositphotos\SDK\Resource\Enterprise\Item\ItemResource;
use Depositphotos\SDK\Resource\Enterprise\Item\Request\ComplimentaryDownloadRequest;
use Depositphotos\SDK\Resource\Enterprise\Item\Request\GetGroupCompDownloadsRequest;
use Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloads\User;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class ItemResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testComplimentaryDownload(): void
    {
        $this->loadFixtures('commands.enterprise.item.complimentaryDownload');

        $resource = new ItemResource($this->createHttpClient());
        $result = $resource->complimentaryDownload(new ComplimentaryDownloadRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_item_id'),
            $this->getFixture('request.dp_option')
        ));

        $this->assertEquals($this->getFixture('response.downloadLink'), $result->getDownloadUrl());
    }

    public function testGetGroupCompDownloads(): void
    {
        $this->loadFixtures('commands.enterprise.item.getGroupCompDownloads');

        $resource = new ItemResource($this->createHttpClient());
        $result = $resource->getGroupCompDownloads(new GetGroupCompDownloadsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            $this->getFixture('request.dp_type'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_group_id'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            new \DateTime($this->getFixture('request.dp_date_end'))
        ));

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());
        foreach ($result->getDownloads() as $key => $download) {
            $fixture = $this->getFixture('response.downloads')[$key];

            $this->assertEquals($fixture['datetime'], $download->getUpdated()->getTimestamp());
            $this->assertEquals($fixture['groupId'], $download->getGroupId());
            $this->assertEquals($fixture['itemId'], $download->getItem()->getId());
            $this->assertEquals($fixture['filename'], $download->getItem()->getFileName());
            $this->assertEquals($fixture['marker'], $download->getMarker());
            $this->assertEquals($fixture['itemType'], $download->getItem()->getType());
            $this->assertEquals($fixture['preview'], $download->getItem()->getPreview());
            $this->assertEquals($fixture['width'], $download->getItem()->getWidth());
            $this->assertEquals($fixture['height'], $download->getItem()->getHeight());
            $this->assertEquals($fixture['userId'], $download->getUserId());
            $this->assertUser($fixture['actor'], $download->getActor());
            $this->assertUser($fixture['seller'], $download->getSeller());
            $this->assertEquals($fixture['download'], $download->getDownloadUrl());
            $this->assertEquals($fixture['visible'], $download->getItem()->isVisible());
        }
    }

    private function assertUser(array $expected, User $user): void
    {
        $this->assertEquals($expected['id'], $user->getId());
        $this->assertEquals($expected['username'], $user->getUsername());
    }
}
