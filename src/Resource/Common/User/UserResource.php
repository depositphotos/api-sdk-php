<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\User;

use Depositphotos\SDK\Resource\Common\User\Request\LogoutRequest;
use Depositphotos\SDK\Resource\Common\User\Request\RenewSessionRequest;
use Depositphotos\SDK\Resource\Common\User\Response\RenewSessionResponse;
use Depositphotos\SDK\Resource\Resource;

class UserResource extends Resource
{
    public function renewSession(RenewSessionRequest $request): RenewSessionResponse
    {
        $httpResponse = $this->send($request);

        return new RenewSessionResponse($this->convertHttpResponseToArray($httpResponse)['data'] ?? []);
    }

    public function logout(LogoutRequest $request): void
    {
        $this->send($request);
    }
}
