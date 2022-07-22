<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Request;

use Depositphotos\SDK\Resource\RequestInterface;
use DateTimeInterface;

class GetUsersFromGroupRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getUsersFromGroup';

    /** @var string */
    private $sessionId;

    /** @var null|int */
    private $limit;

    /** @var int|null */
    private $offset;

    /** @var null|DateTimeInterface */
    private $startDate;

    /** @var null|DateTimeInterface */
    private $endDate;

    /** @var bool */
    private $allStructure;

    /** @var array */
    private $userIds;

    public function __construct(
        string $sessionId,
        ?int $limit = null,
        ?int $offset = null,
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null,
        bool $allStructure = false,
        array $userIds = []
    ) {
        $this->sessionId = $sessionId;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->allStructure = $allStructure;
        $this->userIds = $userIds;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function isAllStructure(): bool
    {
        return $this->allStructure;
    }

    public function getUserIds(): array
    {
        return $this->userIds;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_limit' => $this->getLimit(),
            'dp_offset' => $this->getOffset(),
            'dp_date_start' => $this->getStartDate() ? $this->getStartDate()->format('Y-m-d H:i:s') : null,
            'dp_date_end' => $this->getEndDate() ? $this->getEndDate()->format('Y-m-d H:i:s') : null,
            'dp_all_structure' => $this->isAllStructure(),
            'dp_user_id' => $this->getUserIds(),
        ];
    }
}
