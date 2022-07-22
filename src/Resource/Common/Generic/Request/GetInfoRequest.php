<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetInfoRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getInfo';

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
        ];
    }
}
