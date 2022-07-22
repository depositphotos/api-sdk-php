<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Request;

use Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg\ImageInterface;
use Depositphotos\SDK\Resource\RequestInterface;

class RemoveBgRequest implements RequestInterface
{
    private const COMMAND_NAME = 'removeBg';

    /** @var string */
    private $sessionId;

    /** @var ImageInterface */
    private $image;

    public function __construct(string $sessionId, ImageInterface $image)
    {
        $this->sessionId = $sessionId;
        $this->image = $image;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getImage(): ImageInterface
    {
        return $this->image;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            $this->getImage()->getName() => $this->getImage()->getValue(),
        ];
    }
}
