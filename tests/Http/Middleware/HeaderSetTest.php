<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Http\Middleware;

use Depositphotos\SDK\Http\Middleware\HeaderSet;
use Depositphotos\SDK\Tests\BaseTestCase;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

class HeaderSetTest extends BaseTestCase
{
    public function testExecute(): void
    {
        $headers = [
            'Header' => ['value'],
        ];

        $newHeaders = [
            'New-Header' => ['value2'],
        ];

        $request = new Request('post', '', $headers);
        $middleware = new HeaderSet($newHeaders);

        $expectedData = array_merge($newHeaders, $headers);

        $middleware->execute($request, function (RequestInterface $request) use ($expectedData) {
            $this->assertEquals($expectedData, $request->getHeaders());
            return new Response();
        });
    }
}
