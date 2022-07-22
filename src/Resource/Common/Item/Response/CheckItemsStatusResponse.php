<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Item\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class CheckItemsStatusResponse extends ResponseObject
{
    public function getActive(): array
    {
        return (array) $this->getProperty('active');
    }

    public function getInactive(): array
    {
        return (array) $this->getProperty('inactive');
    }
}
