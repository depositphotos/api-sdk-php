<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class RemoveFromLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'removeFromLightbox';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $lightboxId;

    /** @var array */
    private $itemIds;

    public function __construct(string $sessionId, int $lightboxId, array $itemIds)
    {
        $this->sessionId = $sessionId;
        $this->lightboxId = $lightboxId;
        $this->itemIds = $itemIds;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLightboxId(): int
    {
        return $this->lightboxId;
    }

    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_lightbox_id' => $this->getLightboxId(),
            'dp_media_id' => $this->getItemIds(),
        ];
    }
}
