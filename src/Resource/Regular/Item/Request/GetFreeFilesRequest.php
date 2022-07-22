<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Item\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetFreeFilesRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getFreeFiles';

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var bool */
    private $shuffle;

    /** @var null|string */
    private $type;

    public function __construct(int $limit, int $offset, bool $shuffle = false, string $type = null)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->shuffle = $shuffle;
        $this->type = $type;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function isShuffle(): bool
    {
        return $this->shuffle;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_shuffle' => $this->isShuffle(),
            'dp_type' => $this->getType(),
        ];
    }
}
