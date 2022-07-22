<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetUserSearchHintsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getUserSearchHint';

    /** @var string */
    private $prefix;

    /** @var null|int */
    private $count;

    public function __construct(string $prefix, ?int $count = null)
    {
        $this->prefix = $prefix;
        $this->count = $count;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_prefix' => $this->getPrefix(),
            'dp_count' => $this->getCount(),
        ];
    }
}
