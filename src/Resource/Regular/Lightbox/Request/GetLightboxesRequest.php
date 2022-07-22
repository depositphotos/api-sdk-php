<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetLightboxesRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getLightboxes';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $datetimeFormat;

    /** @var null|string */
    private $thumbSize;

    /** @var null|int */
    private $thumbLimit;

    /** @var null|int */
    private $thumbOffset;

    public function __construct(
        string $sessionId,
        int $limit,
        int $offset,
        ?string $datetimeFormat = null,
        ?string $thumbSize = null,
        ?int $thumbLimit = null,
        ?int $thumbOffset = null
    ) {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->datetimeFormat = $datetimeFormat;
        $this->thumbSize = $thumbSize;
        $this->thumbLimit = $thumbLimit;
        $this->thumbOffset = $thumbOffset;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getDatetimeFormat(): ?string
    {
        return $this->datetimeFormat;
    }

    public function getThumbSize(): ?string
    {
        return $this->thumbSize;
    }

    public function getThumbLimit(): ?int
    {
        return $this->thumbLimit;
    }

    public function getThumbOffset(): ?int
    {
        return $this->thumbOffset;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_datetime_format' => $this->getDatetimeFormat(),
            'dp_thumb_size' => $this->getThumbSize(),
            'dp_thumb_limit' => $this->getThumbLimit(),
            'dp_thumb_offset' => $this->getThumbOffset(),
        ];
    }
}
