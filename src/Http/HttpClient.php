<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Http;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient implements ClientInterface
{
    /** @var ClientInterface */
    private $httpClient;

    /** @var MiddlewareInterface[] */
    private $middleware = [];

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $middlewareChain = $this->createMiddlewareChain($this->middleware, function (RequestInterface $request) {
            return $this->httpClient->sendRequest($request);
        });

        return $middlewareChain($request);
    }

    public function addMiddleware(MiddlewareInterface $middleware): self
    {
        $this->middleware[] = $middleware;

        return $this;
    }

    private function createMiddlewareChain(array $middlewareList, callable $lastCallable): callable
    {
        /** @var MiddlewareInterface $middleware */
        foreach ($middlewareList as $middleware) {
            $lastCallable = function (RequestInterface $request) use ($middleware, $lastCallable) {
                return $middleware->execute($request, $lastCallable);
            };
        }

        return $lastCallable;
    }
}
