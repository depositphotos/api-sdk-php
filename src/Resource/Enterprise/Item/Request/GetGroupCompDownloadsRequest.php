<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetGroupCompDownloadsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getGroupCompDownloads';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var array */
    private $types;

    /** @var null|int */
    private $userId;

    /** @var null|int */
    private $groupId;

    /** @var null|DateTimeInterface */
    private $startDate;

    /** @var null|DateTimeInterface */
    private $endDate;

    public function __construct(
        string $sessionId,
        int $limit,
        int $offset = 0,
        array $types = [],
        ?int $userId = null,
        ?int $groupId = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null
    ) {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->types = $types;
        $this->userId = $userId;
        $this->groupId = $groupId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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

    public function getTypes(): array
    {
        return $this->types;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function toArray(): array
    {
       return [
           'dp_command' => self::COMMAND_NAME,
           'dp_session_id' => $this->getSessionId(),
           'dp_limit' => $this->getLimit(),
           'dp_offset' => $this->getOffset(),
           'dp_type' => $this->getTypes(),
           'dp_user_id' => $this->getUserId(),
           'dp_group_id' => $this->getGroupId(),
           'dp_date_start' => $this->getStartDate() ? $this->getStartDate()->format('Y-m-d H:i:s') : null,
           'dp_date_end' => $this->getEndDate() ? $this->getEndDate()->format('Y-m-d H:i:s') : null,
       ];
    }
}
