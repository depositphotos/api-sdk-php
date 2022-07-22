<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox;

use Depositphotos\SDK\Resource\Regular\Lightbox\Request\AddToLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\CreateLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\GetLightboxesRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\GetLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\RemoveFromLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\RemoveLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\SearchInLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Request\UpdateLightboxRequest;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\AddToLightboxResponse;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\CreateLightboxResponse;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\GetLightboxesResponse;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\GetLightboxResponse;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\SearchInLightboxResponse;
use Depositphotos\SDK\Resource\Regular\Lightbox\Response\UpdateLightboxResponse;
use Depositphotos\SDK\Resource\Resource;

class LightboxResource extends Resource
{
    public function createLightbox(CreateLightboxRequest $request): CreateLightboxResponse
    {
        $httpResponse = $this->send($request);

        return new CreateLightboxResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getLightbox(GetLightboxRequest $request): GetLightboxResponse
    {
        $httpResponse = $this->send($request);

        return new GetLightboxResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function getLightboxes(GetLightboxesRequest $request): GetLightboxesResponse
    {
        $httpResponse = $this->send($request);

        return new GetLightboxesResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function updateLightbox(UpdateLightboxRequest $request): UpdateLightboxResponse
    {
        $httpResponse = $this->send($request);

        return new UpdateLightboxResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function removeLightbox(RemoveLightboxRequest $request): void
    {
        $this->send($request);
    }

    public function addToLightbox(AddToLightboxRequest $request): AddToLightboxResponse
    {
        $httpResponse = $this->send($request);

        return new AddToLightboxResponse($this->convertHttpResponseToArray($httpResponse));
    }

    public function removeFromLightbox(RemoveFromLightboxRequest $request): void
    {
        $this->send($request);
    }

    public function searchInLightbox(SearchInLightboxRequest $request): SearchInLightboxResponse
    {
        $httpResponse = $this->send($request);

        return new SearchInLightboxResponse($this->convertHttpResponseToArray($httpResponse));
    }
}
