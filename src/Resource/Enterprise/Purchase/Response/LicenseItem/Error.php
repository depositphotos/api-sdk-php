<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Response\LicenseItem;

class Error
{
    /** @var int */
    private $itemId;

    /** @var string */
    private $message;

    /** @var int */
    private $code;

    public function __construct(int $itemId, string $message, int $code)
    {
        $this->itemId = $itemId;
        $this->message = $message;
        $this->code = $code;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}
