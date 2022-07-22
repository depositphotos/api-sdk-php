<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Enterprise\User;

use Depositphotos\SDK\Resource\Enterprise\User\Request\ChangePasswordRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\DeleteUserRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\GetGroupRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\GetUserDataRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\GetUsersFromGroupRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\LoginRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\RegisterSubAccountRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\SetPermissionsRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Request\UpdateUserRequest;
use Depositphotos\SDK\Resource\Enterprise\User\Response\Common\User;
use Depositphotos\SDK\Resource\Enterprise\User\UserResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class UserResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testLogin(): void
    {
        $this->loadFixtures('commands.enterprise.user.loginEnterprise');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->login(new LoginRequest(
            $this->getFixture('request.dp_login_user'),
            $this->getFixture('request.dp_login_password')
        ));

        $this->assertEquals($this->getFixture('response.sessionid'), $result->getSessionId());
        $this->assertEquals($this->getFixture('response.userid'), $result->getUserId());
    }

    public function testChangePassword(): void
    {
        $this->loadFixtures('commands.enterprise.user.changePasswordEnterpriseUserByAdmin');

        $resource = new UserResource($this->createHttpClient());
        $resource->changePassword(new ChangePasswordRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_new_password')
        ));
    }

    public function testGetEnterpriseUserData(): void
    {
        $this->loadFixtures('commands.enterprise.user.getEnterpriseUserData');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getUserData(new GetUserDataRequest($this->getFixture('request.dp_session_id')));

        $this->assertUser($this->getFixture('response.data'), $result);
        $this->assertEquals($this->getFixture('response.data')['country'], $result->getCountry());
        $this->assertEquals($this->getFixture('response.data')['businessName'], $result->getBusinessName());
        $this->assertEquals($this->getFixture('response.data')['timezone'], $result->getTimezone());
        $this->assertEquals($this->getFixture('response.data')['website'], $result->getWebsite());
        $this->assertEquals($this->getFixture('response.data')['industry'], $result->getIndustry());
        $this->assertEquals($this->getFixture('response.data')['biography'], $result->getBiography());
        $this->assertEquals($this->getFixture('response.data')['vatNumber'], $result->getVatNumber());
    }

    public function testGetUsersFromGroup(): void
    {
        $this->loadFixtures('commands.enterprise.user.getUsersFromGroup');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getUsersFromGroup(new GetUsersFromGroupRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_limit'),
            $this->getFixture('request.dp_offset'),
            new \DateTime($this->getFixture('request.dp_date_start')),
            $this->getFixture('request.dp_date_end'),
            $this->getFixture('request.dp_all_structure'),
            $this->getFixture('request.dp_user_id')
        ));

        foreach ($result->getUsers() as $key => $user) {
            $fixture = $this->getFixture('response.data')[$key];

            $this->assertUser($fixture, $user);
            $this->assertEquals($fixture['enterpriseStats']['comps'], $user->getStats()->getComps());
            $this->assertEquals($fixture['enterpriseStats']['licensed'], $user->getStats()->getLicensed());
            $this->assertEquals($fixture['enterpriseStats']['transferred'], $user->getStats()->getTransferred());
        }
    }

    public function testSetPermissions(): void
    {
        $this->loadFixtures('commands.enterprise.user.setEnterprisePermissions');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->setPermissions(new SetPermissionsRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_permission'),
            $this->getFixture('request.dp_state')
        ));


        foreach ($result->getPermissions() as $permission) {
            $key = implode(':', array_filter([$permission->getResourceName(), $permission->getResourceId()]));
            $this->assertEquals($this->getFixture('response.permissions')[$key], $permission->getActions());
        }
    }

    public function testUpdateUser(): void
    {
        $this->loadFixtures('commands.enterprise.user.updateEnterpriseUser');

        $resource = new UserResource($this->createHttpClient());
        $request = new UpdateUserRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id'),
            $this->getFixture('request.dp_email')
        );
        $request
            ->setFirstName($this->getFixture('request.dp_first_name'))
            ->setLastName($this->getFixture('request.dp_last_name'))
            ->setCountry($this->getFixture('request.dp_country'))
            ->setCity($this->getFixture('request.dp_city'));
        $result = $resource->updateUser($request);

        $this->assertUser($this->getFixture('response'), $result);
        $this->assertEquals($this->getFixture('response.enterpriseEnabled'), $result->isEnabled());
        $this->assertEquals($this->getFixture('response.enterpriseStats')['comps'], $result->getStats()->getComps());
        $this->assertEquals($this->getFixture('response.enterpriseStats')['licensed'], $result->getStats()->getLicensed());
        $this->assertEquals($this->getFixture('response.enterpriseStats')['transferred'], $result->getStats()->getTransferred());
    }

    public function testDeleteUser(): void
    {
        $this->loadFixtures('commands.enterprise.user.deleteEnterpriseUser');

        $resource = new UserResource($this->createHttpClient());
        $resource->deleteUser(new DeleteUserRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_user_id')
        ));
    }

    public function testRegisterSubAccount(): void
    {
        $this->loadFixtures('commands.enterprise.user.registerEnterpriseSubaccount');

        $resource = new UserResource($this->createHttpClient());
        $request = new RegisterSubAccountRequest(
            $this->getFixture('request.dp_session_id'),
            $this->getFixture('request.dp_regist_user'),
            $this->getFixture('request.dp_regist_email'),
            $this->getFixture('request.dp_regist_password')
        );
        $request
            ->setFirstName($this->getFixture('request.dp_user_info')['firstName'])
            ->setLastName($this->getFixture('request.dp_user_info')['lastName']);
        $result = $resource->registerSubAccount($request);

        $this->assertEquals($this->getFixture('response.userid'), $result->getUserId());
    }

    public function testGetGroup(): void
    {
        $this->loadFixtures('commands.enterprise.user.getUserEnterpriseGroup');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->getGroup(new GetGroupRequest($this->getFixture('request.dp_session_id')));

        $this->assertEquals($this->getFixture('response.data')['groupId'], $result->getGroupId());
        $this->assertEquals($this->getFixture('response.data')['profileId'], $result->getProfileId());
        $this->assertEquals($this->getFixture('response.data')['money'], $result->getMoney());
        $this->assertEquals($this->getFixture('response.data')['vatNumber'], $result->getVatNumber());
        $this->assertEquals($this->getFixture('response.data')['vatRate'], $result->getVatRate());
        $this->assertEquals($this->getFixture('response.data')['vatEnabled'], $result->isVatEnabled());
        $this->assertEquals($this->getFixture('response.data')['isPostpayment'], $result->isPostPayment());
        $this->assertEquals($this->getFixture('response.data')['balance'], $result->getBalance());
    }

    private function assertUser(array $expected, User $user): void
    {
        $this->assertEquals($expected['username'], $user->getUsername());
        $this->assertEquals($expected['firstName'], $user->getFirstName());
        $this->assertEquals($expected['lastName'], $user->getLastName());
        $this->assertEquals($expected['city'], $user->getCity());
        $this->assertEquals($expected['avatarBig'], $user->getAvatarBig());
        $this->assertEquals($expected['avatarSmall'], $user->getAvatarSmall());
        $this->assertEquals($expected['occupation'], $user->getOccupation());
        $this->assertEquals($expected['avatar'], $user->getAvatar());
        $this->assertEquals($expected['userId'] ?? $expected['id'], $user->getId());
        $this->assertEquals($expected['address'], $user->getAddress());
        $this->assertEquals($expected['email'], $user->getEmail());
        $this->assertEquals($expected['phone'], $user->getPhone());
        $this->assertEquals($expected['state'], $user->getState());
        $this->assertEquals($expected['zip'], $user->getZip());
        $this->assertEquals($expected['registered'], $user->getRegistered()->getTimestamp());
        $this->assertEquals($expected['enterpriseLite'], $user->getEnterpriseLite());
    }
}
