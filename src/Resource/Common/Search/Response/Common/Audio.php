<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\Common;

class Audio extends Item
{
    public function getDurationInSeconds(): float
    {
        return (float) $this->getProperty('duration_in_seconds');
    }

    public function getChannels(): int
    {
        return (int) $this->getProperty('channels');
    }

    public function getBitrateKbs(): int
    {
        return (int) $this->getProperty('bitrate_kbs');
    }

    public function getPrecisionBits(): int
    {
        return (int) $this->getProperty('precision_bits');
    }

    public function getSamplingFrequencyHz(): int
    {
        return (int) $this->getProperty('sampling_frequency_hz');
    }

    public function getBpm(): int
    {
        return (int) $this->getProperty('bpm');
    }
}
