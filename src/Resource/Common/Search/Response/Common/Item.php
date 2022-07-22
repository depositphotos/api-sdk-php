<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\Common;

use Depositphotos\SDK\Resource\ResponseObject;

class Item extends ResponseObject
{
    public function cast(string $class): ResponseObject
    {
        switch ($this->data['type'] ?? null) {
            case 'video':
                return new Video($this->data);
            case 'audio':
                return new Audio($this->data);
            default:
                return parent::cast($class);
        }
    }

    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getTitle(): string
    {
        return (string) $this->getProperty('title');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getUserId(): int
    {
        return (int) $this->getProperty('userid');
    }

    public function getUsername(): string
    {
        return (string) $this->getProperty('username');
    }

    public function getStatus(): string
    {
        return (string) $this->getProperty('status');
    }

    public function getViews(): int
    {
        return (int) $this->getProperty('views');
    }

    public function getDownloads(): int
    {
        return (int) $this->getProperty('downloads');
    }

    public function getLevel(): string
    {
        return (string) $this->getProperty('level');
    }

    public function getHeight(): int
    {
        return (int) $this->getProperty('height');
    }

    public function getWidth(): int
    {
        return (int) $this->getProperty('width');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function isEditorial(): bool
    {
        return (bool) $this->getProperty('iseditorial');
    }

    public function getMp(): float
    {
        return (float) $this->getProperty('mp');
    }

    /**
     * @return Size[]
     */
    public function getSizes(): array
    {
        $result = [];

        foreach ($this->data['sizes'] ?? [] as $key => $size) {
            $result[] = new Size(array_merge(['name' => $key], $size));
        }

        return $result;
    }

    public function getPublished(): \DateTimeInterface
    {
        return $this->getDateTime('published');
    }

    public function getUpdated(): \DateTimeInterface
    {
        return $this->getDateTime('updated');
    }

    public function getUploaded(): \DateTimeInterface
    {
        return $this->getDateTime('upload_timestamp');
    }

    public function isExtended(): bool
    {
        return (bool) $this->getProperty('isextended');
    }

    public function isExclusive(): bool
    {
        return (bool) $this->getProperty('isexclusive');
    }

    public function isNudity(): bool
    {
        return (bool) $this->getProperty('nudity');
    }

    public function isFree(): bool
    {
        return (bool) $this->getProperty('isFreeItem');
    }

    public function isBlocked(): bool
    {
        return (bool) $this->getProperty('blocked');
    }

    public function getRoyaltyModel(): ?string
    {
        return $this->getProperty('royalty_model');
    }

    public function getThumbnail(): string
    {
        return (string) $this->getProperty('thumbnail');
    }

    public function getMediumThumbnail(): string
    {
        return (string) $this->getProperty('medium_thumbnail');
    }

    public function getBigThumbnail(): string
    {
        return (string) $this->getProperty('url_big');
    }

    public function getLargeThumbnail(): string
    {
        return (string) $this->getProperty('large_thumb');
    }

    public function getHugeThumbnail(): string
    {
        return (string) $this->getProperty('huge_thumb');
    }

    public function getUrl(): string
    {
        return (string) $this->getProperty('url');
    }

    public function getUrl2(): string
    {
        return (string) $this->getProperty('url2');
    }

    public function getMaxQaUrl(): string
    {
        return (string) $this->getProperty('url_max_qa');
    }

    public function getItemUrl(): string
    {
        return (string) $this->getProperty('itemurl');
    }

    public function getOriginalFilesize(): int
    {
        return (int) $this->getProperty('original_filesize');
    }

    public function getOriginalExtension(): string
    {
        return (string) $this->getProperty('original_extension');
    }

    public function getTags(): array
    {
        return (array) $this->getProperty('tags');
    }

    /**
     * @return int[]
     */
    public function getModelReleases(): array
    {
        return (array) $this->getProperty('model_release_ids');
    }
}
