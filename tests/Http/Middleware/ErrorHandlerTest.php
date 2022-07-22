<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Http\Middleware;

use Depositphotos\SDK\Exception\ClientException;
use Depositphotos\SDK\Http\Middleware\ErrorHandler;
use Depositphotos\SDK\Tests\BaseTestCase;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandlerTest extends BaseTestCase
{
    public function testExecute(): void
    {
        $this->expectException(ClientException::class);

        $middleware = new ErrorHandler();
        $middleware->execute($this->createMock(RequestInterface::class), function () {
            $response = $this->createMock(ResponseInterface::class);
            $response->method('getHeaderLine')->with('Content-Type')->willReturn('application/json');
            $response->method('getBody')->willReturn(json_encode([
                'type' => 'failure',
            ]));

            return $response;
        });
    }

    public function testExecuteWithException(): void
    {
        $request = $this->createMock(RequestInterface::class);

        $originalException = new \Exception('Error message', 100);
        $expectedException = ClientException::create($request);

        $this->expectExceptionObject($expectedException);

        $middleware = new ErrorHandler();
        $middleware->execute($this->createMock(RequestInterface::class), function () use ($originalException) {
            throw $originalException;
        });
    }

    public function testExecuteWithBadResponseException(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn(Utils::streamFor(json_encode([])));

        $originalException = new BadResponseException('Error message', $request, $response);
        $expectedException = ClientException::create($originalException->getRequest(), $originalException->getResponse());

        $this->expectExceptionObject($expectedException);

        $middleware = new ErrorHandler();
        $middleware->execute($this->createMock(RequestInterface::class), function () use ($originalException) {
            throw $originalException;
        });
    }

    public function testExecuteWithRequestException(): void
    {
        $originalException = new RequestException(
            'Error message',
            $this->createMock(RequestInterface::class)
        );

        $expectedException = ClientException::create($originalException->getRequest());

        $this->expectExceptionObject($expectedException);

        $middleware = new ErrorHandler();
        $middleware->execute($this->createMock(RequestInterface::class), function () use ($originalException) {
            throw $originalException;
        });
    }
}
