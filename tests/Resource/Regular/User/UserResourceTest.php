<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\User;

use Depositphotos\SDK\Resource\Regular\User\Request\AvailableFundsRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\ChangePasswordRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\DTO\UserInfoDTO;
use Depositphotos\SDK\Resource\Regular\User\Request\GetIndustryListRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\GetUserDataRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\GetUserSearchHintsRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginAsUserRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\LoginRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\RecoverPasswordRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\RegisterNewUserRequest;
use Depositphotos\SDK\Resource\Regular\User\Request\UpdateUserRequest;
use Depositphotos\SDK\Resource\Regular\User\UserResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class UserResourceTest extends BaseTestCase
{
    use ResourceTrait;

    private const DATE_FORMAT = 'M.d, Y H:i:s';

    public function testLogin(): void
    {
        $this->loadFixtures('commands.regular.user.login');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->login(new LoginRequest(
            $this->getFixture('request.dp_login_user'),
            $this->getFixture('request.dp_login_password')
        ));

        $this->assertEquals($this->getFixture('response.sessionid'), $result->getSessionId());
        $this->assertEquals($this->getFixture('response.userId'), $result->getUserId());
    }

    public function testLoginAsUser(): void
    {
        $this->loadFixtures('commands.regular.user.loginAsUser');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->loginAsUser(new LoginAsUserRequest(
            $this->getFixture('request.dp_login_user'),
            $this->getFixture('request.dp_login_password')
        ));

        $this->assertEquals($this->getFixture('response.sessionid'), $result->getSessionId());
        $this->assertEquals($this->getFixture('response.userid'), $result->getUserId());
    }

    public function testRecoverPassword(): void
    {
        $this->loadFixtures('commands.regular.user.recoverPassword');

        $resource = new UserResource($this->createHttpClient());
        $resource->recoverPassword(new RecoverPasswordRequest(
            $this->getFixture('request.dp_login_user'),
            $this->getFixture('request.dp_login_email')
        ));
    }

    public function testRegisterNewUser(): void
    {
        $this->loadFixtures('commands.regular.user.registerNewUser');

        $userInfo = new UserInfoDTO();
        $userInfo
            ->setUsername($this->getFixture('request.dp_user_info.username'))
            ->setFirstName($this->getFixture('request.dp_user_info.firstName'))
            ->setLastName($this->getFixture('request.dp_user_info.lastName'))
            ->setEmail($this->getFixture('request.dp_user_info.email'))
            ->setCountry($this->getFixture('request.dp_user_info.country'))
            ->setCity($this->getFixture('request.dp_user_info.city'))
            ->setState($this->getFixture('request.dp_user_info.state'))
            ->setAddress($this->getFixture('request.dp_user_info.address'))
            ->setZip($this->getFixture('request.dp_user_info.zip'))
            ->setPhone($this->getFixture('request.dp_user_info.phone'))
            ->setOccupation($this->getFixture('request.dp_user_info.occupation'))
            ->setGender($this->getFixture('request.dp_user_info.gender'))
            ->setCompany($this->getFixture('request.dp_user_info.company'))
            ->setBusinessType($this->getFixture('request.dp_user_info.businessType'))
            ->setBusiness($this->getFixture('request.dp_user_info.business'))
            ->setWebsite($this->getFixture('request.dp_user_info.website'));

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->registerNewUser(new RegisterNewUserRequest(
            $this->getFixture('request.dp_regist_user'),
            $this->getFixture('request.dp_regist_password'),
            $this->getFixture('request.dp_regist_email'),
            $userInfo
        ));

        $this->assertEquals($this->getFixture('response.userid'), $result->getUserId());
    }

    public function testChangePassword(): void
    {
        $this->loadFixtures('commands.regular.user.changePassword');

        $resource = new UserResource($this->createHttpClient());
        $resource->changePassword(new ChangePasswordRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_old_password'),
            $this->getFixture('request.dp_new_password')
        ));
    }

    public function testGetIndustryList(): void
    {
        $this->loadFixtures('commands.regular.user.getIndustryList');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getIndustryList(new GetIndustryListRequest());

        $this->assertEquals($this->getFixture('response.industries'), $result->getIndustries());
    }

    public function testGetUserSearchHints(): void
    {
        $this->loadFixtures('commands.regular.user.getUserSearchHint');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getUserSearchHints(new GetUserSearchHintsRequest(
            $this->getFixture('request.dp_prefix'),
            $this->getFixture('request.dp_count')
        ));

        $this->assertCount(count($this->getFixture('response.hints')), $result->getHints());

        foreach ($result->getHints() as $key => $hint) {
            $this->assertEquals($this->getFixture('response.hints')[$key], [
                'avatar' => $hint->getAvatar(),
                'onlinePhotos' => $hint->getOnlinePhotos(),
                'onlineFiles' => $hint->getOnlineFiles(),
                'sellerId' => $hint->getSellerId(),
                'phraseMatched' => $hint->getPhraseMatched(),
                'phraseSuggestion' => $hint->getPhraseSuggestion(),
                'phrase' => $hint->getPhrase(),
                'sellerInfo' => $hint->getSellerInfo(),
                'sellerUrl' => $hint->getSellerUrl(),
            ]);
        }
    }

    public function testAvailableFunds(): void
    {
        $this->loadFixtures('commands.regular.user.availableFunds');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->availableFunds(new AvailableFundsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_datetime_format')
        ));

        $this->assertEquals($this->getFixture('response.balance'), $result->getBalance());
        $this->assertEquals($this->getFixture('response.creditsAvailable'), $result->getCreditsAvailable());
        $this->assertEquals($this->getFixture('response.creditsExpire'), $result->getCreditsExpire());
        $this->assertEquals($this->getFixture('response.subscriptionDownloadsTodayAvailable'), $result->getSubscriptionDownloadsTodayAvailable());
        $this->assertEquals($this->getFixture('response.leftBonusFiles'), $result->getLeftBonusFiles());
        $this->assertCount(count($this->getFixture('response.activeSubscriptions')), $result->getSubscriptions());
        $this->assertCount(count($this->getFixture('response.onDemandDownloads')), $result->getOnDemands());

        foreach ($result->getSubscriptions() as $key => $subscription) {
            $this->assertEquals($this->getFixture('response.activeSubscriptions')[$key], [
                'id' => $subscription->getId(),
                'name' => $subscription->getName(),
                'status' => $subscription->getStatus(),
                'purchaseMethod' => $subscription->getPurchaseMethod(),
                'dateBegin' => $subscription->getBeginDate()->format(self::DATE_FORMAT),
                'dateEnd' => $subscription->getEndDate()->format(self::DATE_FORMAT),
                'amount' => $subscription->getAmount(),
                'period' => $subscription->getPeriod(),
                'buyPeriod' => $subscription->getBuyPeriod(),
                'renewalTime' => $subscription->getRenewalTime()->format(self::DATE_FORMAT),
                'count' => $subscription->getBalance(),
            ]);
        }

        foreach ($result->getOnDemands() as $key => $onDemand) {
            $this->assertEquals($this->getFixture('response.onDemandDownloads')[$key], [
                'balance' => $onDemand->getBalance(),
                'product' => $onDemand->getProduct(),
                'subproduct' => $onDemand->getSubProduct(),
                'expire' => $onDemand->getExpire()->format(self::DATE_FORMAT),
            ]);
        }
    }

    public function testUpdateUser(): void
    {
        $this->loadFixtures('commands.regular.user.updateUser');

        $request = new UpdateUserRequest($this->getFixture('request.dp_session_id'));
        $request->setEmail($this->getFixture('request.dp_email'));
        $request->setFirstName($this->getFixture('request.dp_first_name'));
        $request->setLastName($this->getFixture('request.dp_last_name'));
        $request->setUsername($this->getFixture('request.dp_username'));
        $request->setGender($this->getFixture('request.dp_gender'));
        $request->setAddress($this->getFixture('request.dp_address'));
        $request->setCity($this->getFixture('request.dp_city'));
        $request->setState($this->getFixture('request.dp_state'));
        $request->setCountry($this->getFixture('request.dp_country'));
        $request->setZip($this->getFixture('request.dp_zip'));
        $request->setTimezone($this->getFixture('request.dp_timezone'));
        $request->setPhone($this->getFixture('request.dp_phone'));
        $request->setNews($this->getFixture('request.dp_news'));
        $request->setCompany($this->getFixture('request.dp_company'));
        $request->setBusinessName($this->getFixture('request.dp_business_name'));
        $request->setBusinessPhone($this->getFixture('request.dp_business_phone'));
        $request->setWebsite($this->getFixture('request.dp_website'));
        $request->setFacebook($this->getFixture('request.dp_facebook'));
        $request->setOccupation($this->getFixture('request.dp_occupation'));
        $request->setBiography($this->getFixture('request.dp_biography'));
        $request->setIndustry($this->getFixture('request.dp_industry'));

        $resource = new UserResource($this->createHttpClient());
        $resource->updateUser($request);
    }

    public function testGetUserData(): void
    {
        $this->loadFixtures('commands.regular.user.getUserData');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getUserData(new GetUserDataRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_datetime_format')
        ));

        $this->assertEquals($this->getFixture('response.balance'), $result->getBalance());
        $this->assertEquals($this->getFixture('response.status'), $result->getStatus());
        $this->assertEquals($this->getFixture('response.timezone'), $result->getTimezone());
        $this->assertEquals($this->getFixture('response.username'), $result->getUsername());
        $this->assertEquals($this->getFixture('response.email'), $result->getEmail());
        $this->assertEquals($this->getFixture('response.firstName'), $result->getFirstName());
        $this->assertEquals($this->getFixture('response.lastName'), $result->getLastName());
        $this->assertEquals($this->getFixture('response.gender'), $result->getGender());
        $this->assertEquals($this->getFixture('response.news'), $result->getNews());
        $this->assertEquals($this->getFixture('response.phone'), $result->getPhone());
        $this->assertEquals($this->getFixture('response.businessName'), $result->getBusinessName());
        $this->assertEquals($this->getFixture('response.facebook'), $result->getFacebook());
        $this->assertEquals($this->getFixture('response.avatar'), $result->getAvatar());
        $this->assertEquals($this->getFixture('response.company'), $result->getCompany());
        $this->assertEquals($this->getFixture('response.address'), $result->getAddress());
        $this->assertEquals($this->getFixture('response.city'), $result->getCity());
        $this->assertEquals($this->getFixture('response.state'), $result->getState());
        $this->assertEquals($this->getFixture('response.country'), $result->getCountry());
        $this->assertEquals($this->getFixture('response.zip'), $result->getZip());
        $this->assertEquals($this->getFixture('response.biography'), $result->getBiography());
        $this->assertEquals($this->getFixture('response.businessPhone'), $result->getBusinessPhone());
        $this->assertEquals($this->getFixture('response.creditsAmount'), $result->getCreditsAmount());
        $this->assertEquals($this->getFixture('response.filesAmount'), $result->getFilesAmount());
        $this->assertEquals($this->getFixture('response.invoiceAmount'), $result->getInvoiceAmount());
        $this->assertEquals($this->getFixture('response.occupation'), $result->getOccupation());
        $this->assertEquals($this->getFixture('response.vatNumber'), $result->getVatNumber());
        $this->assertEquals($this->getFixture('response.website'), $result->getWebsite());
        $this->assertEquals($this->getFixture('response.industry'), $result->getIndustry());
        $this->assertEquals($this->getFixture('response.equipment'), $result->getEquipment());
        $this->assertEquals($this->getFixture('response.notifySales'), $result->getNotifySales());
        $this->assertEquals($this->getFixture('response.notifySelection'), $result->getNotifySelection());

        foreach ($result->getSubscriptions() as $key => $subscription) {
            $this->assertEquals($this->getFixture('response.subscriptions')[$key], [
                'name' => $subscription->getName(),
                'status' => $subscription->getStatus(),
                'purchaseMethod' => $subscription->getPurchaseMethod(),
                'dateBegin' => $subscription->getBeginDate()->format(self::DATE_FORMAT),
                'dateEnd' => $subscription->getEndDate()->format(self::DATE_FORMAT),
                'period' => $subscription->getPeriod(),
                'amount' => $subscription->getAmount(),
            ]);
        }
    }
}
