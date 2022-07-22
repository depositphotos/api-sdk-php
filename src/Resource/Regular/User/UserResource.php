<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User;

use Depositphotos\SDK\Resource\Regular\User\Request\AvailableFundsRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\ChangePasswordRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\GetIndustryListRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\GetUserDataRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\GetUserSearchHintsRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginAsUserRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\RecoverPasswordRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\RegisterNewUserRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\UpdateUserRequest;
use Depositphotos\SDK\Resource\Regular\User\Response\AvailableFundsResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\GetIndustryListResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\GetUserDataResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\GetUserSearchHintsResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\LoginAsUserResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\LoginResponse;
use Depositphotos\SDK\Resource\Regular\User\Response\RegisterNewUserResponse;
use Depositphotos\SDK\Resource\Common\User\UserResource as BaseUserResource;

class UserResource extends BaseUserResource
{
    public function login(LoginRequest $request): LoginResponse
    {
        $httpResponse = $this->send($request);

        return new LoginResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function loginAsUser(LoginAsUserRequest $request): LoginAsUserResponse
    {
        $httpResponse = $this->send($request);

        return new LoginAsUserResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function recoverPassword(RecoverPasswordRequest $request): void
    {
        $this->send($request);
    }

    public function registerNewUser(RegisterNewUserRequest $request): RegisterNewUserResponse
    {
        $httpResponse = $this->send($request);

        return new RegisterNewUserResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function changePassword(ChangePasswordRequest $request): void
    {
        $this->send($request);
    }

    public function getIndustryList(GetIndustryListRequest $request): GetIndustryListResponse
    {
        $httpResponse = $this->send($request);

        return new GetIndustryListResponse($this->convertHttpResponseToArray($httpResponse) );
    }

    public function getUserSearchHints(GetUserSearchHintsRequest $request): GetUserSearchHintsResponse
    {
        $httpResponse = $this->send($request);

        return new GetUserSearchHintsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function availableFunds(AvailableFundsRequest $request): AvailableFundsResponse
    {
        $httpResponse = $this->send($request);

        return new AvailableFundsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function updateUser(UpdateUserRequest $request): void
    {
        $this->send($request);
    }

    public function getUserData(GetUserDataRequest $request): GetUserDataResponse
    {
        $httpResponse = $this->send($request);

        return new GetUserDataResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
