<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Response;

use Depositphotos\SDK\Resource\Regular\Lightbox\Response\Common\Lightbox;
use Depositphotos\SDK\Resource\ResponseObject;

class UpdateLightboxResponse extends ResponseObject
{
    public function getLightbox(): Lightbox
    {
        return $this->getProperty('lightbox', Lightbox::class);
    }
}
