<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetLicensedItemsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getLicensedItems';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $type;

    /** @var null|int */
    private $userId;

    /** @var null|int */
    private $groupId;

    /** @var null|DateTimeInterface */
    private $startDate;

    /** @var null|DateTimeInterface */
    private $endDate;

    /** @var int[] */
    private $itemIds = [];

    /** @var int[] */
    private $methodIds = [];

    public function __construct(string $sessionId, int $limit, int $offset = 0)
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    public function setItemIds(array $itemIds): self
    {
        $this->itemIds = $itemIds;

        return $this;
    }

    public function getMethodIds(): array
    {
        return $this->methodIds;
    }

    public function setMethodIds(array $methodIds): self
    {
        $this->methodIds = $methodIds;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_type' => $this->getType(),
            'dp_user_id' => $this->getUserId(),
            'dp_group_id' => $this->getGroupId(),
            'dp_date_start' => $this->getStartDate() ? $this->getStartDate()->format('Y-m-d H:i:s') : null,
            'dp_date_end' => $this->getEndDate() ? $this->getEndDate()->format('Y-m-d H:i:s') : null,
            'dp_item_ids' => $this->getItemIds(),
            'dp_method_ids' => $this->getMethodIds(),
        ];
    }
}
