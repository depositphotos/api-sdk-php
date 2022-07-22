<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase\Response\GetPurchases;

use Depositphotos\SDK\Resource\ResponseObject;

class Similar extends ResponseObject
{
    public function getItemId(): int
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

    public function getMaxQaUrl(): string
    {
        return (string) $this->getProperty('url_max_qa');
    }
}
