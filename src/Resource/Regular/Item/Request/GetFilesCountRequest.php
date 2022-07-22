<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetFilesCountRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getFilesCount';

    /** @var null|string */
    private $type;

    public function __construct(string $type = null)
    {
        $this->type = $type;
    }

    public function getType(): ?string
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
