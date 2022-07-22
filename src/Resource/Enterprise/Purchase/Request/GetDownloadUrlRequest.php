<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetDownloadUrlRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getDownloadLink';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $itemId;

    /** @var string */
    private $size;

    public function __construct(string $sessionId, int $itemId, string $size)
    {
        $this->sessionId = $sessionId;
        $this->itemId = $itemId;
        $this->size = $size;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_item_id' => $this->getItemId(),
            'dp_option' => $this->getSize(),
        ];
    }
}
