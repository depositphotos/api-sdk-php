<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Response;

use Psr\Http\Message\StreamInterface;

class RemoveBgResponse
{
    /** @var StreamInterface */
    private $content;

    /** @var string */
    private $contentType;

    /** @var int */
    private $width;

    /** @var int */
    private $height;

    public function __construct(StreamInterface $content, string $contentType, int $width, int $height)
    {
        $this->content = $content;
        $this->contentType = $contentType;
        $this->width = $width;
        $this->height = $height;
    }

    public function getContent(): StreamInterface
    {
        return $this->content;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}
