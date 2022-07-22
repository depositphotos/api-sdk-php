<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource;

use GuzzleHttp\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface as HttpRequestInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\Psr7;

class Resource
{
    /** @var ClientInterface */
    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function send(RequestInterface $request, array $options = []): HttpResponseInterface
    {
        $httpRequest = $this->prepareHttpRequest($request, $options);

        return $this->httpClient->sendRequest($httpRequest);
    }

    protected function convertHttpResponseToArray(HttpResponseInterface $httpResponse): array
    {
        return (array) Utils::jsonDecode((string) $httpResponse->getBody(), true);
    }

    private function prepareHttpRequest(RequestInterface $request, array $options): HttpRequestInterface
    {
        if (isset($options['multipart']) && $options['multipart'] === true) {
            $multipart = [];
            foreach ($request->toArray() as $field => $value) {
                $multipart[] = [
                    'name' => $field,
                    'contents' => $value,
                ];
            }
            $body = new Psr7\MultipartStream($multipart);
            $headers = [
                'Content-Type' => 'multipart/form-data; boundary=' . $body->getBoundary(),
            ];
        } else {
            $body = Psr7\Utils::streamFor(http_build_query($request->toArray()));
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ];
        }

        return new HttpRequest('POST', '', $headers, $body);
    }
}
