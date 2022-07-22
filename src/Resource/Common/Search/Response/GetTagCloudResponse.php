<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response;

use Depositphotos\SDK\Resource\ResponseObject;
use Depositphotos\SDK\Resource\Common\Search\Response\GetTagCloud\Tag;

class GetTagCloudResponse extends ResponseObject
{
    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        $result = [];

        foreach ($this->data['result'] ?? [] as $tag) {
            $data = array_merge($tag, $tag['name'] ?? []);
            unset($data['name']);

            $result[] = new Tag($data);
        }

        return $result;
    }
}
