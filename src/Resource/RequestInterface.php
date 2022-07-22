<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource;

interface RequestInterface
{
    public function toArray(): array;
}
