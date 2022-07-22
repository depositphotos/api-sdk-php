<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount;

use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\CreateSubAccountRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\CreateSubAccountSubscriptionRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\DeleteSubAccountRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetCreditStatusRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetSubAccountDataRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetSubAccountPurchasesRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetSubAccountsRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetSubscriptionOffersRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\GetSubscriptionsRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Request\UpdateSubAccountRequest;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\CreateSubAccountResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\CreateSubAccountSubscriptionResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\DeleteSubAccountResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetCreditStatusResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubAccountDataResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubAccountPurchasesResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubAccountsResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubscriptionOffersResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\GetSubscriptionsResponse;
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\UpdateSubAccountResponse;
use Depositphotos\SDK\Resource\Resource;

class SubAccountResource extends Resource
{
    public function createSubAccount(CreateSubAccountRequest $request): CreateSubAccountResponse
    {
        $httpResponse = $this->send($request);

        return new CreateSubAccountResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function updateSubAccount(UpdateSubAccountRequest $request): UpdateSubAccountResponse
    {
        $httpResponse = $this->send($request);

        return new UpdateSubAccountResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function createSubAccountSubscription(CreateSubAccountSubscriptionRequest $request): CreateSubAccountSubscriptionResponse
    {
        $httpResponse = $this->send($request);

        return new CreateSubAccountSubscriptionResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function deleteSubAccount(DeleteSubAccountRequest $request): DeleteSubAccountResponse
    {
        $httpResponse = $this->send($request);

        return new DeleteSubAccountResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getCreditStatus(GetCreditStatusRequest $request): GetCreditStatusResponse
    {
        $httpResponse = $this->send($request);

        return new GetCreditStatusResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSubAccountData(GetSubAccountDataRequest $request): GetSubAccountDataResponse
    {
        $httpResponse = $this->send($request);

        return new GetSubAccountDataResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSubAccountPurchases(GetSubAccountPurchasesRequest $request): GetSubAccountPurchasesResponse
    {
        $httpResponse = $this->send($request);

        return new GetSubAccountPurchasesResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSubAccounts(GetSubAccountsRequest $request): GetSubAccountsResponse
    {
        $httpResponse = $this->send($request);

        return new GetSubAccountsResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSubscriptionOffers(GetSubscriptionOffersRequest $request): GetSubscriptionOffersResponse
    {
        $httpResponse = $this->send($request);

        return new GetSubscriptionOffersResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getSubscriptions(GetSubscriptionsRequest $request): GetSubscriptionsResponse
    {
        $httpResponse = $this->send($request);

        return new GetSubscriptionsResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
