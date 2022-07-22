<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface MiddlewareInterface
{
    public function execute(RequestInterface $request, callable $next): ResponseInterface;
}
