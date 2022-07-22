<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class UpdateLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'updateLightbox';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $lightboxId;

    /** @var null|string */
    private $title;

    /** @var null|string */
    private $description;

    /** @var bool */
    private $public;

    public function __construct(
        string $sessionId,
        int $lightboxId,
        ?string $title = null,
        ?string $description = null,
        bool $public = false
    ) {
        $this->sessionId = $sessionId;
        $this->lightboxId = $lightboxId;
        $this->title = $title;
        $this->description = $description;
        $this->public = $public;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLightboxId(): int
    {
        return $this->lightboxId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isPublic(): bool
    {
        return $this->public;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_lightbox_id' => $this->getLightboxId(),
            'dp_lightbox_title' => $this->getTitle(),
            'dp_lightbox_description' => $this->getDescription(),
            'dp_lightbox_public' => $this->isPublic(),
        ];
    }
}
