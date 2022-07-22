<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\Tools;

use Depositphotos\SDK\Http\HttpClient;
use Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg\Url;
use Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBgRequest;
use Depositphotos\SDK\Resource\Regular\Tools\ToolsResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamInterface;

class ToolsResourceTest extends BaseTestCase
{
    public function testRemoveBg(): void
    {
        $this->loadFixtures('commands.regular.tools.removeBg');

        $response = new Response(200, [
            'Content-Type' => 'image/png',
            'X-Width' => 200,
            'X-Height' => 300,
        ], $this->createMock(StreamInterface::class));

        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->willReturn($response);

        $resource = new ToolsResource(new HttpClient($client));
        $result = $resource->removeBg(new RemoveBgRequest(
            $this->getFixture('request.dp_session_id'),
            new Url( $this->getFixture('request.dp_image_url')))
        );

        $this->assertEquals($response->getHeaderLine('Content-Type'), $result->getContentType());
        $this->assertEquals($response->getHeaderLine('X-Width'), $result->getWidth());
        $this->assertEquals($response->getHeaderLine('X-Height'), $result->getHeight());
    }
}
