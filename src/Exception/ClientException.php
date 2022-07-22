<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Exception;

use GuzzleHttp\Utils;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ClientException extends Exception implements ClientExceptionInterface
{
    public const DEFAULT_ERROR_MESSAGE = 'Unknown error';

    /** @var RequestInterface */
    private $request;

    /** @var null|ResponseInterface */
    private $response;

    public function __construct(
        string $message,
        int $code,
        RequestInterface $request,
        ?ResponseInterface $response = null,
        ?Throwable $previous = null
    ) {
        $this->request = $request;
        $this->response = $response;

        parent::__construct($message, $code, $previous);
    }

    public static function create(
        RequestInterface $request,
        ?ResponseInterface $response = null,
        ?Throwable $previous = null
    ): self {
        $responseData = $response ? (array) Utils::jsonDecode((string) $response->getBody(), true) : [];

        $errorData = $responseData['error'] ?? [];
        $errorMessage = $errorData['errormsg'] ?? self::DEFAULT_ERROR_MESSAGE;
        $errorCode = $errorData['errorcode'] ?? 0;

        switch ($errorData['exception'] ?? null) {
            case 'EAPI\EIllegalSession':
            case 'EIllegalSession':
                $exceptionClass = InvalidSessionException::class;
                break;
            case 'EAPI\EIllegalApiKey':
                $exceptionClass = InvalidApiKeyException::class;
                break;
            case 'EUser\Authentication':
                $exceptionClass = AuthenticationException::class;
                break;
            case 'EInternal\InvalidParam':
            case 'EApi\EInvalidParam':
                $exceptionClass = InvalidParamException::class;
                break;
            case 'EAPI\EApiTypeNotAllowed':
                $exceptionClass = NotAllowedApiTypeException::class;
                break;
            case 'EAPI\EUndefinedCommand':
                $exceptionClass = UndefinedCommandException::class;
                break;
            case 'NotFoundItemException':
                $exceptionClass = ItemNotFoundException::class;
                break;
            case 'EApi\EInternalError':
                $exceptionClass = InternalErrorException::class;
                break;
            case 'EAPI\EValueNotAllowed':
                $exceptionClass = NotAllowedValueException::class;
                break;
            default:
                $exceptionClass = self::class;
        }

        return new $exceptionClass($errorMessage, $errorCode, $request, $response, $previous);
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
