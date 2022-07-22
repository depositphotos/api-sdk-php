<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\Common;

class Video extends Item
{
    public function getMp4Thumbnail(): string
    {
        return (string) $this->getProperty('mp4');
    }

    public function getLength(): int
    {
        return (int) $this->getProperty('length');
    }

    public function getFps(): int
    {
        return (int) $this->getProperty('fps');
    }
}
