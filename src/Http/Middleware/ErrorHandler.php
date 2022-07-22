<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Http\Middleware;

use Depositphotos\SDK\Exception\ClientException;
use Depositphotos\SDK\Http\MiddlewareInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Utils;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Exception;

class ErrorHandler implements MiddlewareInterface
{
    private const TYPE_SUCCESS = 'success';

    public function execute(RequestInterface $request, callable $next): ResponseInterface
    {
        try {
            $response = $next($request);
        } catch (BadResponseException $e) {
            throw ClientException::create($e->getRequest(), $e->getResponse(), $e);
        } catch (RequestExceptionInterface $e) {
            throw ClientException::create($e->getRequest(), null, $e);
        } catch (Exception $e) {
            throw ClientException::create($request, null, $e);
        }

        if ($this->isSuccess($response)) {
            return $response;
        }

        throw ClientException::create($request, $response);
    }

    private function isSuccess(ResponseInterface $response): bool
    {
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') !== false) {
            $responseData = (array) Utils::jsonDecode((string) $response->getBody(), true);

            return ($responseData['type'] ?? null) === self::TYPE_SUCCESS;
        }

        return $response->getStatusCode() === 200;
    }
}
