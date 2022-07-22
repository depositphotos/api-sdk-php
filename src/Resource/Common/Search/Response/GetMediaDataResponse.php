<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response;

use Depositphotos\SDK\Resource\Common\Search\Response\Common\Item;
use Depositphotos\SDK\Resource\Common\Search\Response\GetMediaData\Related;

class GetMediaDataResponse extends Item
{
    /**
     * @return Related[]|int[]
     */
    public function getSimilar(): array
    {
        return $this->getRelated($this->data['similar'] ?? []);
    }

    /**
     * @return Related[]|int[]
     */
    public function getSeries(): array
    {
        return $this->getRelated($this->data['series'] ?? []);
    }

    /**
     * @return Related[]|int[]
     */
    public function getSameModel(): array
    {
        return $this->getRelated($this->data['same_model'] ?? []);
    }

    private function getRelated(array $data): array
    {
        if ($this->isList($data)) {
            return $data;
        }

        return array_map(function ($related) {
            return new Related($related);
        }, $data);
    }
}
