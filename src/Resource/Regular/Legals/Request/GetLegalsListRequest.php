<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Legals\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetLegalsListRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getLegalsList';

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
        ];
    }
}
