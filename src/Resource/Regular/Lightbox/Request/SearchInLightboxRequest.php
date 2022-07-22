<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Lightbox\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class SearchInLightboxRequest implements RequestInterface
{
    private const COMMAND_NAME = 'searchInLightbox';

    /** @var int */
    private $lightboxId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $query;

    /** @var null|string */
    private $hash;

    /** @var null|bool */
    private $photo;

    /** @var null|bool */
    private $vector;

    /** @var null|bool */
    private $video;

    /** @var null|bool */
    private $audio;

    /** @var null|bool */
    private $editorial;

    public function __construct(int $lightboxId, int $limit, int $offset, ?string $query = null, ?string $hash = null)
    {
        $this->lightboxId = $lightboxId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->query = $query;
        $this->hash = $hash;
    }

    public function getLightboxId(): int
    {
        return $this->lightboxId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getPhoto(): ?bool
    {
        return $this->photo;
    }

    public function setPhoto(?bool $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getVector(): ?bool
    {
        return $this->vector;
    }

    public function setVector(?bool $vector): self
    {
        $this->vector = $vector;

        return $this;
    }

    public function getVideo(): ?bool
    {
        return $this->video;
    }

    public function setVideo(?bool $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getAudio(): ?bool
    {
        return $this->audio;
    }

    public function setAudio(?bool $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    public function getEditorial(): ?bool
    {
        return $this->editorial;
    }

    public function setEditorial(?bool $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_lightbox_id' => $this->getLightboxId(),
            'dp_query' => $this->getQuery(),
            'dp_search_hash' => $this->getHash(),
            'dp_search_photo' => $this->getPhoto(),
            'dp_search_vector' => $this->getVector(),
            'dp_search_video' => $this->getVideo(),
            'dp_search_audio' => $this->getAudio(),
            'dp_search_editorial' => $this->getEditorial(),
        ];
    }
}
