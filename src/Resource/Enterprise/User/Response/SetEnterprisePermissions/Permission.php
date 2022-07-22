<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response\SetEnterprisePermissions;

class Permission
{
    /** @var int */
    private $resourceId;

    /** @var string */
    private $resourceName;

    /** @var array */
    private $actions;

    public function __construct(int $resourceId, string $resourceName, array $actions)
    {
        $this->resourceId = $resourceId;
        $this->resourceName = $resourceName;
        $this->actions = $actions;
    }

    public function getResourceId(): int
    {
        return $this->resourceId;
    }

    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    public function getActions(): array
    {
        return $this->actions;
    }
}
