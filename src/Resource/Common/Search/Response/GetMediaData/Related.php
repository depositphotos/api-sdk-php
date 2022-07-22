<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\GetMediaData;

use Depositphotos\SDK\Resource\ResponseObject;

class Related extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getThumbnail(): string
    {
        return (string) $this->getProperty('thumbnail');
    }

    public function getLargeThumbnail(): string
    {
        return (string) $this->getProperty('large_thumb');
    }

    public function getHugeThumbnail(): string
    {
        return (string) $this->getProperty('huge_thumb');
    }

    public function getNeutralWmThumbnail(): string
    {
        return (string) $this->getProperty('thumb_neutral_wm');
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getMaxQaUrl(): string
    {
        return (string) $this->getProperty('url_max_qa');
    }

    public function getItemUrl(): string
    {
        return (string) $this->getProperty('itemurl');
    }

    public function getOriginalTitle(): string
    {
        return (string) $this->getProperty('original_title');
    }

    public function getOriginalDescription(): string
    {
        return (string) $this->getProperty('original_description');
    }

    public function isFreeItem(): bool
    {
        return (bool) $this->getProperty('isFreeItem');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }
}
