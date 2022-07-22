<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetStatisticsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseStatisticsDates';

    /** @var string */
    private $sessionId;

    /** @var DateTimeInterface */
    private $startDate;

    /** @var DateTimeInterface */
    private $endDate;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|int */
    private $groupId;

    /** @var null|int */
    private $userId;

    public function __construct(
        string $sessionId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        int $limit,
        int $offset = 0,
        ?int $groupId = null,
        ?int $userId = null
    ) {
        $this->sessionId = $sessionId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->groupId = $groupId;
        $this->userId = $userId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTimeInterface
    {
        return $this->endDate;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_date_start' => $this->getStartDate()->format('Y-m-d H:i:s'),
            'dp_date_end' => $this->getEndDate()->format('Y-m-d H:i:s'),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_group_id' => $this->getGroupId(),
            'dp_user_id' => $this->getUserId(),
        ];
    }
}
