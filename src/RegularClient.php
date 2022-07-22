<?php
declare(strict_types=1);

namespace Depositphotos\SDK;

use Depositphotos\SDK\Resource\Common\Generic\GenericResource;
use Depositphotos\SDK\Resource\Regular\Item\ItemResource;
use Depositphotos\SDK\Resource\Regular\Lightbox\LightboxResource;
use Depositphotos\SDK\Resource\Regular\Legals\LegalsResource;
use Depositphotos\SDK\Resource\Regular\Purchase\PurchaseResource;
use Depositphotos\SDK\Resource\Common\Search\SearchResource;
use Depositphotos\SDK\Resource\Regular\Tools\ToolsResource;
use Depositphotos\SDK\Resource\Regular\User\UserResource;

class RegularClient extends Client
{
    public function generic(): GenericResource
    {
        return new GenericResource($this->httpClient);
    }

    public function user(): UserResource
    {
        return new UserResource($this->httpClient);
    }

    public function item(): ItemResource
    {
        return new ItemResource($this->httpClient);
    }

    public function legals(): LegalsResource
    {
        return new LegalsResource($this->httpClient);
    }

    public function purchase(): PurchaseResource
    {
        return new PurchaseResource($this->httpClient);
    }

    public function lightbox(): LightboxResource
    {
        return new LightboxResource($this->httpClient);
    }

    public function search(): SearchResource
    {
        return new SearchResource($this->httpClient);
    }

    public function tools(): ToolsResource
    {
        return new ToolsResource($this->httpClient);
    }
}
