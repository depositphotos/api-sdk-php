<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic\Response;

use Depositphotos\SDK\Resource\ResponseObject;

class GetInfoResponse extends ResponseObject
{
    public function getTotalFiles(): int
    {
        return (int) $this->getProperty('totalFiles');
    }

    public function getTotalWeekFiles(): int
    {
        return (int) $this->getProperty('totalWeekFiles');
    }
}
