<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item\Response;

use Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloads\Download;
use Depositphotos\SDK\Resource\ResponseObject;

class GetGroupCompDownloadsResponse extends ResponseObject
{
    /**
     * @return Download[]
     */
    public function getDownloads(): array
    {
        return $this->getProperty('downloads', Download::class);
    }

    public function getCount(): int
    {
        return (int) $this->getProperty('count');
    }
}
