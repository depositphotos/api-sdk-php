<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic\Response\Help;

use Depositphotos\SDK\Resource\ResponseObject;

class ExceptionInfo extends ResponseObject
{
    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }
}
