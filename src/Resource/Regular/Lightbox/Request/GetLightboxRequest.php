<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getLightbox';

    /** @var int */
    private $lightboxId;

    /** @var null|string */
    private $datetimeFormat;

    public function __construct(int $lightboxId, ?string $datetimeFormat = null)
    {
        $this->lightboxId = $lightboxId;
        $this->datetimeFormat = $datetimeFormat;
    }

    public function getLightboxId(): int
    {
        return $this->lightboxId;
    }

    public function getDatetimeFormat(): ?string
    {
        return $this->datetimeFormat;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_lightbox_id' => $this->getLightboxId(),
            'dp_datetime_format' => $this->getDatetimeFormat(),
        ];
    }
}
