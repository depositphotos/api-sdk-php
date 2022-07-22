<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Corporate\SubAccount\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class CreateSubAccountSubscriptionRequest implements RequestInterface
{
    private const COMMAND_NAME = 'createSubaccountSubscription';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $subAccountId;

    /** @var int */
    private $offerId;

    public function __construct(string $sessionId, int $subAccountId, int $offerId)
    {
        $this->sessionId = $sessionId;
        $this->subAccountId = $subAccountId;
        $this->offerId = $offerId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getSubAccountId(): int
    {
        return $this->subAccountId;
    }

    public function getOfferId(): int
    {
        return $this->offerId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_subaccount_id' => $this->getSubAccountId(),
            'dp_offer_id' => $this->getOfferId(),
        ];
    }
}
