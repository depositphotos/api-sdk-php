<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Purchase\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetMediaRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getMedia';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $itemId;

    /** @var string */
    private $size;

    /** @var string */
    private $license;

    /** @var null|int */
    private $subscriptionId;

    public function __construct(
        string $sessionId,
        int $itemId,
        string $size,
        string $license,
        ?int $subscriptionId = null
    ) {
        $this->sessionId = $sessionId;
        $this->itemId = $itemId;
        $this->size = $size;
        $this->license = $license;
        $this->subscriptionId = $subscriptionId;
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

    public function getLicense(): string
    {
        return $this->license;
    }

    public function getSubscriptionId(): ?int
    {
        return $this->subscriptionId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_media_id' => $this->getItemId(),
            'dp_media_option' => $this->getSize(),
            'dp_media_license' => $this->getLicense(),
            'dp_subscription_id' => $this->getSubscriptionId(),
        ];
    }
}
