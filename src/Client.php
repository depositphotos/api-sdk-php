<?php
declare(strict_types=1);

namespace Depositphotos\SDK;

use Depositphotos\SDK\Http\HttpConfigurator;
use Depositphotos\SDK\Http\HttpClient;

class Client
{
    /** @var HttpClient */
    protected $httpClient;

    public function __construct(HttpConfigurator $httpConfigurator)
    {
        $this->httpClient = $httpConfigurator->makeConfiguredHttpClient();
    }

    public static function createRegularClient(string $apiKey): RegularClient
    {
        return new RegularClient(new HttpConfigurator($apiKey));
    }

    public static function createEnterpriseClient(string $apiKey): EnterpriseClient
    {
        return new EnterpriseClient(new HttpConfigurator($apiKey));
    }

    public static function createCorporateClient(string $apiKey): CorporateClient
    {
        return new CorporateClient(new HttpConfigurator($apiKey));
    }
}
