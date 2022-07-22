<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource;

use Depositphotos\SDK\Http\HttpClient;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

trait ResourceTrait
{
    protected function createHttpClient(): HttpClient
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn(Utils::streamFor(json_encode($this->getFixture('response'))));

        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->with($this->callback(function (RequestInterface $request) {
            $this->assertEquals((string) $request->getBody(), http_build_query($this->getFixture('request')));
            return true;
        }))->willReturn($response);

        return new HttpClient($client);
    }
}
