<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetIndustryListRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getIndustryList';

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
        ];
    }
}
