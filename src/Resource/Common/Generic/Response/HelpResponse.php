<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic\Response;

use Depositphotos\SDK\Resource\Common\Generic\Response\Help\ExceptionInfo;
use Depositphotos\SDK\Resource\ResponseObject;

class HelpResponse extends ResponseObject
{
    public function getMethod(): string
    {
        return (string) $this->getProperty('method');
    }

    public function getDescription(): string
    {
        return (string) $this->getProperty('description');
    }

    public function getLongDescription(): string
    {
        return (string) $this->getProperty('longDescription');
    }

    /**
     * @return ExceptionInfo[]
     */
    public function getExceptions(): array
    {
        return (array) $this->getProperty('exception', ExceptionInfo::class);
    }
}
