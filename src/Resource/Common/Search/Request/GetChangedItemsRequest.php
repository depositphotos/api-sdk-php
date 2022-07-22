<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetChangedItemsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getChangedItems';
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    /** @var \DateTimeInterface */
    private $from;

    /** @var \DateTimeInterface */
    private $to;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    public function __construct(\DateTimeInterface $from, \DateTimeInterface $to, int $limit, int $offset = 0)
    {
        $this->from = $from;
        $this->to = $to;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getFrom(): \DateTimeInterface
    {
        return $this->from;
    }

    public function getTo(): \DateTimeInterface
    {
        return $this->to;
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
            'datetime_from' => $this->getFrom()->format(self::DATE_FORMAT),
            'datetime_to' => $this->getTo()->format(self::DATE_FORMAT),
            'dp_search_limit' => $this->getLimit(),
            'dp_search_offset' => $this->getOffset(),
        ];
    }
}
