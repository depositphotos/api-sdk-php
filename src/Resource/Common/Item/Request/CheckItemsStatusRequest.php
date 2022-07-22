<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Item\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class CheckItemsStatusRequest implements RequestInterface
{
    private const COMMAND_NAME = 'checkItemsStatus';

    /** @var array */
    private $ids;

    public function __construct(array $itemIds)
    {
        $this->ids = $itemIds;
    }

    public function getIds(): array
    {
        return $this->ids;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_ids' => $this->getIds(),
        ];
    }
}
