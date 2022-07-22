<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Common\User;

use Depositphotos\SDK\Resource\Common\User\Request\LogoutRequest;
use Depositphotos\SDK\Resource\Common\User\Request\RenewSessionRequest;
use Depositphotos\SDK\Resource\Common\User\UserResource;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class UserResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testLogout(): void
    {
        $this->loadFixtures('commands.common.user.logout');

        $resource = new UserResource($this->createHttpClient());
        $resource->logout(new LogoutRequest($this->getFixture('request.dp_session_id')));
    }

    public function testRenewSession(): void
    {
        $this->loadFixtures('commands.common.user.renewSession');

        $resource = new UserResource($this->createHttpClient());
        $result = $resource->renewSession(new RenewSessionRequest($this->getFixture('request.dp_session_id')));

        $this->assertEquals($this->getFixture('response.data.sessionid'), $result->getSessionId());
        $this->assertEquals($this->getFixture('response.data.userid'), $result->getUserId());
    }
}
