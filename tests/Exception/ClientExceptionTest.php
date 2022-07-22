<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Exception;

use Depositphotos\SDK\Exception\AuthenticationException;
use Depositphotos\SDK\Exception\ClientException;
use Depositphotos\SDK\Exception\InternalErrorException;
use Depositphotos\SDK\Exception\InvalidApiKeyException;
use Depositphotos\SDK\Exception\InvalidParamException;
use Depositphotos\SDK\Exception\InvalidSessionException;
use Depositphotos\SDK\Exception\ItemNotFoundException;
use Depositphotos\SDK\Exception\NotAllowedValueException;
use Depositphotos\SDK\Exception\UndefinedCommandException;
use Depositphotos\SDK\Tests\BaseTestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ClientExceptionTest extends BaseTestCase
{
    /**
     * @dataProvider responseErrorProvider
     */
    public function testCreate(array $responseData, string $expectedException): void
    {
        $request = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn(json_encode($responseData));

        $exception = ClientException::create($request, $response);

        $this->assertInstanceOf($expectedException, $exception);
        $this->assertEquals($request, $exception->getRequest());
        $this->assertEquals($response, $exception->getResponse());
        $this->assertEquals($responseData['error']['errormsg'] ?? ClientException::DEFAULT_ERROR_MESSAGE, $exception->getMessage());
        $this->assertEquals($responseData['error']['errorcode'] ?? 0, $exception->getCode());
    }

    public function responseErrorProvider(): array
    {
        return [
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'dp_command should be specified',
                        'errorcode' => 400,
                        'exception' => 'EAPI\\EUndefinedCommand',
                    ],
                ],
                UndefinedCommandException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'The API key is illegal, use correct characters and API key length',
                        'errorcode' => 403,
                        'exception' => 'EAPI\\EIllegalApiKey',
                    ],
                ],
                InvalidApiKeyException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'Session ID invalid or session is expired',
                        'errorcode' => 403,
                        'exception' => 'EAPI\\EIllegalSession',
                    ],
                ],
                InvalidSessionException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'Dp_media_id is required and cannot be empty',
                        'errorcode' => 400,
                        'exception' => 'EInternal\\InvalidParam',
                    ],
                ],
                InvalidParamException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'Item does not exists',
                        'errorcode' => 0,
                        'exception' => 'NotFoundItemException',
                    ],
                ],
                ItemNotFoundException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'This login does not exist. Please try again.',
                        'errorcode' => 404,
                        'exception' => 'EUser\\Authentication',
                    ],
                ],
                AuthenticationException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'Internal error',
                        'errorcode' => 0,
                        'exception' => 'EApi\\EInternalError',
                    ],
                ],
                InternalErrorException::class,
            ],
            [
                [
                    'type' =>  'failure',
                    'error' => [
                        'errormsg' => 'Specified command not found',
                        'errorcode' => 403,
                        'exception' => 'EAPI\\EValueNotAllowed',
                    ],
                ],
                NotAllowedValueException::class,
            ],
            [
                [
                    'type' =>  'failure',
                ],
                ClientException::class,
            ],
        ];
    }
}
