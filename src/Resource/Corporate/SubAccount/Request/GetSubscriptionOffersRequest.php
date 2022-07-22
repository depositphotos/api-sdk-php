<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetSubscriptionOffersRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getSubscriptionOffers';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $subAccountId;

    public function __construct(string $sessionId, int $subAccountId)
    {
        $this->sessionId = $sessionId;
        $this->subAccountId = $subAccountId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getSubAccountId(): int
    {
        return $this->subAccountId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_id' => $this->getSubAccountId(),
        ];
    }
}
