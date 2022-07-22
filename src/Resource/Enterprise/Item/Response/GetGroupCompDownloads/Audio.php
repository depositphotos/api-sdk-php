<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Item\Response\GetGroupCompDownloads;

class Audio extends Item
{
    public function getAudioType(): string
    {
        return (string) $this->getProperty('itemAudioType');
    }

    public function getGenre(): string
    {
        return (string) $this->getProperty('itemGenre');
    }
}
