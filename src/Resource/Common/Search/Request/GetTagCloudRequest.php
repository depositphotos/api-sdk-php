<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetTagCloudRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getTagCloud';

    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_type' => $this->getType(),
        ];
    }
}
