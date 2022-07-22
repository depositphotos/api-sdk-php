<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class CreateLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'createLightbox';

    /** @var string */
    private $sessionId;

    /** @var null|string */
    private $title;

    /** @var null|string */
    private $description;

    public function __construct(string $sessionId, ?string $title = null, ?string $description = null)
    {
        $this->sessionId = $sessionId;
        $this->title = $title;
        $this->description = $description;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_lightbox_title' => $this->getTitle(),
            'dp_lightbox_description' => $this->getDescription(),
        ];
    }
}
