<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests;

use Depositphotos\SDK\Exception\AuthenticationException;
use Depositphotos\SDK\Http\HttpClient;
use Depositphotos\SDK\Http\HttpConfigurator;
use Depositphotos\SDK\RegularClient;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginRequest;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7;

class ClientTest extends BaseTestCase
{
    public function testLogin(): void
    {
        $sessionId = '098f6bcd4621d373cade4e832627b4f6';
        $userId = 1;

        $response = $this->createResponse([
            'type' => 'success',
            'sessionid' => $sessionId,
            'userId' => $userId,
        ]);

        $client = new RegularClient($this->createHttpConfigurator($response));
        $result = $client->user()->login(new LoginRequest('login', 'password'));

        $this->assertEquals($sessionId, $result->getSessionId());
        $this->assertEquals($userId, $result->getUserId());
    }

    public function testLoginWithException(): void
    {
        $this->expectException(AuthenticationException::class);

        $response = $this->createResponse([
            'type' => 'failure',
            'error' => [
                'errorcode' => 404,
                'errormsg' => 'This login does not exist. Please try again.',
                'exception' => 'EUser\\Authentication',
            ],
        ]);

        $client = new RegularClient($this->createHttpConfigurator($response));
        $client->user()->login(new LoginRequest('login', 'password'));
    }

    private function createResponse(array $data): ResponseInterface
    {
        return new Psr7\Response(200, [ 'Content-Type' => 'application/json' ],  json_encode($data));
    }

    private function createHttpConfigurator(ResponseInterface $response): HttpConfigurator
    {
        $apiKey = 'apiKey';

        $psrHttpClientMock = $this->createMock(ClientInterface::class);
        $psrHttpClientMock->method('sendRequest')->with($this->callback(function (RequestInterface $request) use ($apiKey) {
            $this->assertEquals($request->getHeaderLine('Api-Key'), $apiKey);
            return true;
        }))->willReturn($response);

        return new HttpConfigurator($apiKey, new HttpClient($psrHttpClientMock));
    }
}
