<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests\Resource\Regular\Legals;

use Depositphotos\SDK\Resource\Regular\Legals\LegalsResource;
use Depositphotos\SDK\Resource\Regular\Legals\Request\GetLegalDocumentRequest;
use Depositphotos\SDK\Resource\Regular\Legals\Request\GetLegalsListRequest;
use Depositphotos\SDK\Tests\BaseTestCase;
use Depositphotos\SDK\Tests\Resource\ResourceTrait;

class LegalsResourceTest extends BaseTestCase
{
    use ResourceTrait;

    public function testGetLegalsList(): void
    {
        $this->loadFixtures('commands.regular.legals.getLegalsList');

        $resource = new LegalsResource($this->createHttpClient());
        $result = $resource->getLegalsList(new GetLegalsListRequest());

        $this->assertEquals($this->getFixture('response.legals'), $result->getLegals());
    }

    public function testGetLegalDocument(): void
    {
        $this->loadFixtures('commands.regular.legals.getLegalDocument');

        $resource = new LegalsResource($this->createHttpClient());
        $result = $resource->getLegalDocument(new GetLegalDocumentRequest(
            $this->getFixture('request.dp_legal_name'),
            $this->getFixture('request.dp_lang')
        ));

        $this->assertEquals($this->getFixture('response.document'), $result->getDocument());
    }
}
