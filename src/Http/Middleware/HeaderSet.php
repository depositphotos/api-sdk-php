<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Http\Middleware;

use Depositphotos\SDK\Http\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HeaderSet implements MiddlewareInterface
{
    /** @var string[] */
    private $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public function execute(RequestInterface $request, callable $next): ResponseInterface
    {
        foreach ($this->headers as $header => $headerValue) {
            $request = $request->withHeader($header, $headerValue);
        }

        return $next($request);
    }
}
