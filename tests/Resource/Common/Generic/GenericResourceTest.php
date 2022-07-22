<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Common\Generic;

use Depositphotos\SDK\Resource\Common\Generic\Response\Help\ExceptionInfo;
use Depositphotos\SDK\Resource\Common\Generic\GenericResource;
use Depositphotos\SDK\Resource\Common\Generic\Request\GetInfoRequest;
use Depositphotos\SDK\Resource\Common\Generic\Request\HelpRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class GenericResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetInfo(): void
    {
        $this->loadFixtures('commands.common.generic.getInfo');

        $resource = new GenericResource($this->createHttpClient());
        $result = $resource->getInfo(new GetInfoRequest());

        $this->assertEquals($this->getFixture('response.totalFiles'), $result->getTotalFiles());
        $this->assertEquals($this->getFixture('response.totalWeekFiles'), $result->getTotalWeekFiles());
    }

    public function testHelp(): void
    {
        $this->loadFixtures('commands.common.generic.help');

        $resource = new GenericResource($this->createHttpClient());
        $result = $resource->help(new HelpRequest($this->getFixture('request.dp_by_command')));

        $this->assertEquals($this->getFixture('response.help')['method'], $result->getMethod());
        $this->assertEquals($this->getFixture('response.help')['description'], $result->getDescription());
        $this->assertEquals($this->getFixture('response.help')['longDescription'], $result->getLongDescription());
        $this->assertEquals($this->getFixture('response.help')['exception'], array_map(function (ExceptionInfo $exceptionDTO) {
            return [
                'type' => $exceptionDTO->getType(),
                'description' => $exceptionDTO->getDescription(),
            ];
        }, $result->getExceptions()));
    }
}
