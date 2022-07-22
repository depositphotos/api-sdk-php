<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Corporate\SubAccount;

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
use Depositphotos\SDK\Resource\Corporate\SubAccount\Response\Common\Subscription;
use Depositphotos\SDK\Resource\Corporate\SubAccount\SubAccountResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class SubAccountResourceTest extends BaseTestCase
{
    use ResourceTrait;

    private const DATE_FORMAT = 'M.d, Y H:i:s';

    public function testCreateSubAccount(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.createSubaccount');

        $resource = new SubAccountResource($this->createHttpClient());
        $result = $resource->createSubAccount(new CreateSubAccountRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_email'),
            $this->getFixture('request.dp_subaccount_fname'),
            $this->getFixture('request.dp_subaccount_lname'),
            $this->getFixture('request.dp_subaccount_username'),
            $this->getFixture('request.dp_subaccount_password')
        ));

        $this->assertEquals($this->getFixture('response.subaccountId'), $result->getSubAccountId());
    }

    public function testUpdateSubAccount(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.updateSubaccount');

        $resource = new SubAccountResource($this->createHttpClient());
        $request = new UpdateSubAccountRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id')
        );
        $request
            ->setFirstName($this->getFixture('request.dp_subaccount_fname'))
            ->setLastName($this->getFixture('request.dp_subaccount_lname'))
            ->setEmail($this->getFixture('request.dp_subaccount_email'))
            ->setCompany($this->getFixture('request.dp_subaccount_company'));

        $result = $resource->updateSubAccount($request);

        $this->assertEquals($this->getFixture('response.subaccountId'), $result->getSubAccountId());
    }

    public function testCreateSubAccountSubscription(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.createSubaccountSubscription');

        $resource = new SubAccountResource($this->createHttpClient());
        $result = $resource->createSubAccountSubscription(new CreateSubAccountSubscriptionRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id'),
            $this->getFixture('request.dp_offer_id')
        ));

        $this->assertEquals($this->getFixture('response.product_id'), $result->getProductId());
    }

    public function testGetCreditStatus(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getCreditStatus');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getCreditStatus(new GetCreditStatusRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id')
        ));

        $this->assertEquals($this->getFixture('response.creditsAmount'), $result->getCreditsAmount());
        $this->assertEquals($this->getFixture('response.subscriptionAmount'), $result->getSubscriptionAmount());
        $this->assertEquals($this->getFixture('response.invoiceAmount'), $result->getInvoiceAmount());
        $this->assertEquals($this->getFixture('response.filesAmount'), $result->getFilesAmount());
    }

    public function testGetSubAccountData(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getSubaccountData');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getSubAccountData(new GetSubAccountDataRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id')
        ));

        $this->assertEquals($this->getFixture('response.creditsAmount'), $result->getCreditsAmount());
        $this->assertEquals($this->getFixture('response.subscriptionAmount'), $result->getSubscriptionAmount());
        $this->assertEquals($this->getFixture('response.invoiceAmount'), $result->getInvoiceAmountO());
        $this->assertEquals($this->getFixture('response.filesAmount'), $result->getFilesAmount());

        foreach ($result->getSubscriptions() as $key => $subscription) {
            $this->assertSubscription($this->getFixture('response.subscriptions')[$key], $subscription);
        }
    }

    public function testGetSubAccountPurchases(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getSubaccountPurchases');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getSubAccountPurchases(new GetSubAccountPurchasesRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id'),
            $this->getFixture('request.dp_subaccount_limit'),
            $this->getFixture('request.dp_subaccount_offset'),
            $this->getFixture('request.dp_datetime_format')
        ));

        foreach ($result->getPurchases() as $key => $purchase) {
            $fixture = $this->getFixture('response.purchases')[$key];

            $this->assertEquals($fixture['mediaId'], $purchase->getItemId());
            $this->assertEquals($fixture['license'], $purchase->getLicense());
            $this->assertEquals($fixture['size'], $purchase->getSize());
            $this->assertEquals($fixture['price'], $purchase->getPrice());
            $this->assertEquals($fixture['purchaseDate'], $purchase->getPurchaseDate()->format(self::DATE_FORMAT));
            $this->assertEquals($fixture['url'], $purchase->getUrl());
            $this->assertEquals($fixture['licenseId'], $purchase->getLicenseId());
            $this->assertEquals($fixture['width'], $purchase->getWidth());
            $this->assertEquals($fixture['height'], $purchase->getHeight());
            $this->assertEquals($fixture['mp'], $purchase->getMp());
        }

        $this->assertEquals($this->getFixture('response.count'), $result->getCount());
    }

    public function testGetSubAccounts(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getSubaccounts');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getSubAccounts(new GetSubAccountsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_limit'),
            $this->getFixture('request.dp_subaccount_offset')
        ));

        $this->assertEquals($this->getFixture('response.subaccounts'), $result->getSubAccounts());
        $this->assertEquals($this->getFixture('response.count'), $result->getCount());
    }

    public function testGetSubscriptionOffers(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getSubscriptionOffers');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getSubscriptionOffers(new GetSubscriptionOffersRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id')
        ));

        foreach ($result->getOffers() as $key => $offer) {
            $fixture = $this->getFixture('response.offers')[$key];

            $this->assertEquals($fixture['offerId'], $offer->getId());
            $this->assertEquals($fixture['name'], $offer->getName());
            $this->assertEquals($fixture['description'], $offer->getDescription());
            $this->assertEquals($fixture['period'], $offer->getPeriod());
            $this->assertEquals($fixture['buyPeriod'], $offer->getBuyPeriod());
            $this->assertEquals($fixture['count'], $offer->getCount());
            $this->assertEquals($fixture['price'], $offer->getPrice());

            if (isset($fixture['discount'])) {
                $this->assertEquals($fixture['discount'], $offer->getDiscount());
            }
        }
    }

    public function testGetSubscriptions(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.getSubscriptions');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->getSubscriptions(new GetSubscriptionsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id'),
            $this->getFixture('request.dp_datetime_format')
        ));

        foreach ($result->getSubscriptions() as $key => $subscription) {
            $this->assertSubscription($this->getFixture('response.subscriptions')[$key], $subscription);
        }
    }

    public function testDeleteSubAccount(): void
    {
        $this->loadFixtures('commands.corporate.subAccount.deleteSubaccount');

        $resource = new SubAccountResource($this->createHttpClient());

        $result = $resource->deleteSubAccount(new DeleteSubAccountRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_subaccount_id')
        ));

        $this->assertEquals($this->getFixture('response.subaccountId'), $result->getSubAccountId());
    }

    private function assertSubscription(array $expected, Subscription $subscription): void
    {
        $this->assertEquals($expected['id'], $subscription->getId());
        $this->assertEquals($expected['name'], $subscription->getName());
        $this->assertEquals($expected['status'], $subscription->getStatus());
        $this->assertEquals($expected['purchaseMethod'], $subscription->getPurchaseMethod());
        $this->assertEquals($expected['dateBegin'], $subscription->getBeginDate()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['dateEnd'], $subscription->getEndDate()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['amount'], $subscription->getAmount());
        $this->assertEquals($expected['period'], $subscription->getPeriod());
        $this->assertEquals($expected['buyPeriod'], $subscription->getBuyPeriod());
        $this->assertEquals($expected['renewalTime'], $subscription->getRenewalTime()->format(self::DATE_FORMAT));
        $this->assertEquals($expected['price'], $subscription->getPrice());
        $this->assertEquals($expected['membership'], $subscription->isMembership());
    }
}
