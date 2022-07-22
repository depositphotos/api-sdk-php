<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common\Lightbox;
use Depositphotos\SDK\Resource\ResponseObject;

class GetLightboxesResponse extends ResponseObject
{
    public function getLightboxes(): array
    {
        return (array) $this->getProperty('lightboxes', Lightbox::class);
    }

    public function getCount(): int
    {
        return $this->getProperty('count');
    }
}
