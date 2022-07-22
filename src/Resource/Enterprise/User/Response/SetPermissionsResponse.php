<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\User\Response;

use Depositphotos\SDK\Resource\Enterprise\User\Response\SetEnterprisePermissions\Permission;
use Depositphotos\SDK\Resource\ResponseObject;

class SetPermissionsResponse extends ResponseObject
{
    /**
     * @return Permission[]
     */
    public function getPermissions(): array
    {
        $result = [];

        foreach ($this->data['permissions'] ?? [] as $resourceData => $actions) {
            [$resourceName, $resourceId] = array_pad(explode(':', $resourceData), 2, null);

            $result[] = new Permission((int) $resourceId, (string) $resourceName, (array) $actions);
        }

        return $result;
    }
}
