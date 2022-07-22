<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response\GetUsersFromGroup;

use Depositphotos\SDK\Resource\ResponseObject;

class Permission extends ResponseObject
{
    public function getResourceType(): array
    {
        return (array) $this->getProperty('resourceType');
    }

    public function getAction(): array
    {
        return (array) $this->getProperty('action');
    }
}
