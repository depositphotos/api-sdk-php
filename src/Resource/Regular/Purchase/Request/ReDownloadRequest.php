<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Purchase\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class ReDownloadRequest implements RequestInterface
{
    private const COMMAND_NAME = 'reDownload';

    /** @var string */
    private $sessionId;

    /** @var int */
    private $licenseId;

    /** @var null|int */
    private $subAccountId;

    /** @var null|int */
    private $subAccountLicenseId;

    public function __construct(
        string $sessionId,
        int $licenseId,
        ?int $subAccountId = null,
        ?int $subAccountLicenseId = null
    ) {
        $this->sessionId = $sessionId;
        $this->licenseId = $licenseId;
        $this->subAccountId = $subAccountId;
        $this->subAccountLicenseId = $subAccountLicenseId;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLicenseId(): int
    {
        return $this->licenseId;
    }

    public function getSubAccountId(): ?int
    {
        return $this->subAccountId;
    }

    public function getSubAccountLicenseId(): ?int
    {
        return $this->subAccountLicenseId;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_license_id' => $this->getLicenseId(),
            'dp_subaccount_id' => $this->getSubAccountId(),
            'dp_subaccount_license_id' => $this->getSubAccountLicenseId(),
        ];
    }
}
