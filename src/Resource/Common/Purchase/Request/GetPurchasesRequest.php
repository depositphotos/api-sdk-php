<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Purchase\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetPurchasesRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getPurchases';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $sortField;

    /** @var null|string */
    private $sortType;

    /** @var null|int */
    private $subAccountId;

    /** @var null|int */
    private $itemId;

    /** @var null|string */
    private $size;

    /** @var null|string */
    private $datetimeFormat;

    public function __construct(string $sessionId, int $limit, int $offset)
    {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    public function setSortField(?string $sortField): self
    {
        $this->sortField = $sortField;

        return $this;
    }

    public function getSortType(): ?string
    {
        return $this->sortType;
    }

    public function setSortType(?string $sortType): self
    {
        $this->sortType = $sortType;

        return $this;
    }

    public function getSubAccountId(): ?int
    {
        return $this->subAccountId;
    }

    public function setSubAccountId(?int $subAccountId): self
    {
        $this->subAccountId = $subAccountId;

        return $this;
    }

    public function getItemId(): ?int
    {
        return $this->itemId;
    }

    public function setItemId(?int $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getDatetimeFormat(): ?string
    {
        return $this->datetimeFormat;
    }

    public function setDatetimeFormat(?string $datetimeFormat): self
    {
        $this->datetimeFormat = $datetimeFormat;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_sort_field' => $this->getSortField(),
            'dp_sort_type' => $this->getSortType(),
            'dp_subaccount_id' => $this->getSubAccountId(),
            'dp_item_id' => $this->getItemId(),
            'dp_size' => $this->getSize(),
            'dp_datetime_format' => $this->getDatetimeFormat(),
        ];
    }
}
