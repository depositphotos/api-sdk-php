<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetRelatedRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getRelated';

    /** @var int */
    private $itemId;

    /** @var string */
    private $relatedType;

    /** @var null|int */
    private $limit;

    /** @var null|int */
    private $offset;

    public function __construct(int $itemId, string $relatedType, ?int $limit = null, ?int $offset = null)
    {
        $this->itemId = $itemId;
        $this->relatedType = $relatedType;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function getRelatedType(): string
    {
        return $this->relatedType;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_search_item_id' => $this->getItemId(),
            'dp_related_type' => $this->getRelatedType(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
        ];
    }
}
