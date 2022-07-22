<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetTotalStatisticsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseStatisticsTotal';

    /** @var string */
    private $sessionId;

    /** @var DateTimeInterface */
    private $startDate;

    /** @var DateTimeInterface */
    private $endDate;

    /** @var null|int */
    private $groupId;

    /** @var null|int */
    private $userId;

    public function __construct(
        string $sessionId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        ?int $groupId = null,
        ?int $userId = null
    ) {
        $this->sessionId = $sessionId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
            'dp_group_id' => $this->getGroupId(),
            'dp_user_id' => $this->getUserId(),
        ];
    }
}
