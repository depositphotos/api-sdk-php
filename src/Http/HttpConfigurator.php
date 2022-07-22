<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Http;

use Depositphotos\SDK\Http\Middleware\ErrorHandler;
use Depositphotos\SDK\Http\Middleware\HeaderSet;
use Psr\Http\Client\ClientInterface;
use GuzzleHttp\Client as GuzzleHttpClient;

class HttpConfigurator
{
    private const API_ENDPOINT = 'https://api.depositphotos.com';

    /** @var string */
    private $apiKey;

    /** @var string */
    private $endpoint;

    /** @var null|ClientInterface */
    private $httpClient;

    public function __construct(string $apiKey, ?ClientInterface $httpClient = null, ?string $endpoint = null)
    {
        $this->apiKey = $apiKey;
        $this->endpoint = $endpoint ?? self::API_ENDPOINT;
        $this->httpClient = $httpClient;
    }

    public function makeConfiguredHttpClient(): HttpClient
    {
        $configuredHttpClient = new HttpClient($this->httpClient ?? new GuzzleHttpClient([
            'base_uri' => $this->endpoint
        ]));

        $configuredHttpClient
            ->addMiddleware(new ErrorHandler())
            ->addMiddleware(new HeaderSet([
                'Api-Key' => $this->apiKey,
            ]));

        return $configuredHttpClient;
    }
}
