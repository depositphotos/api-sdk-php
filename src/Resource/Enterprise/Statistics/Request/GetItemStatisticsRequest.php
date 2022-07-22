<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Statistics\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetItemStatisticsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getEnterpriseStatisticsItems';

    /** @var string */
    private $sessionId;

    /** @var null|int */
    private $userId;

    /** @var DateTimeInterface */
    private $startDate;

    /** @var DateTimeInterface */
    private $endDate;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    public function __construct(
        string $sessionId,
        int $userId,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        int $limit,
        int $offset = 0
    ) {
        $this->sessionId = $sessionId;
        $this->userId = $userId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
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

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_user_id' => $this->getUserId(),
            'dp_date_start' => $this->getStartDate()->format('Y-m-d H:i:s'),
            'dp_date_end' => $this->getEndDate()->format('Y-m-d H:i:s'),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
        ];
    }
}
