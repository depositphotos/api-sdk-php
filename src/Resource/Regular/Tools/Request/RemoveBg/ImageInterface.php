<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg;

interface ImageInterface
{
    public function getName(): string;

    /**
     * @return mixed
     */
    public function getValue();
}
