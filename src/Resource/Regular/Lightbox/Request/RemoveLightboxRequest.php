<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class RemoveLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'removeLightbox';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $lightboxId;

    public function __construct(string $sessionId, int $lightboxId)
    {
        $this->sessionId = $sessionId;
        $this->lightboxId = $lightboxId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLightboxId(): int
    {
        return $this->lightboxId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_lightbox_id' => $this->getLightboxId(),
        ];
    }
}
