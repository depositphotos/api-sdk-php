<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Response\GetTagCloud;

use Depositphotos\SDK\Resource\ResponseObject;

class Tag extends ResponseObject
{
    public function getId(): int
    {
        return (int) $this->getProperty('id');
    }

    public function getLang(): string
    {
        return (string) $this->getProperty('lang');
    }

    public function getPhrase(): string
    {
        return (string) $this->getProperty('phrase');
    }

    public function getType(): string
    {
        return (string) $this->getProperty('type');
    }

    public function getFrom(): ?\DateTimeInterface
    {
        return $this->getDateTimeOrNull('date_from');
    }

    public function getTo(): ?\DateTimeInterface
    {
        return $this->getDateTimeOrNull('date_to');
    }

    public function getRate(): int
    {
        return (int) $this->getProperty('rate');
    }
}
