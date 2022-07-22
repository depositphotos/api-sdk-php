<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Common\Item;

use Depositphotos\SDK\Resource\Common\Item\ItemResource;
use Depositphotos\SDK\Resource\Common\Item\Request\CheckItemsStatusRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class ItemResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testCheckItemsStatus(): void
    {
        $this->loadFixtures('commands.common.item.checkItemsStatus');

        $resource = new ItemResource($this->createHttpClient());
        $result = $resource->checkItemsStatus(new CheckItemsStatusRequest($this->getFixture('request.dp_ids')));

        $this->assertEquals($this->getFixture('response.active'), $result->getActive());
        $this->assertEquals($this->getFixture('response.inactive'), $result->getInactive());
    }
}
