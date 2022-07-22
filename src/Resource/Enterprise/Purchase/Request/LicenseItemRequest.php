<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Enterprise\Purchase\Request;

use Depositphotos\SDK\Exception\Exception;
use Depositphotos\SDK\Resource\RequestInterface;
use Depositphotos\SDK\Resource\Enterprise\Purchase\Request\LicenseItem\LicensingInfo;

class LicenseItemRequest implements RequestInterface
{
    private const COMMAND_NAME = 'licenseItem';

    /** @var string */
    private $sessionId;

    /** @var LicensingInfo[] */
    private $licensing;

    /** @var null|string */
    private $project;

    /** @var null|string */
    private $client;

    /** @var null|string */
    private $purchaseOrder;

    /** @var null|string */
    private $isbn;

    /** @var null|string */
    private $other;

    public function __construct(string $sessionId, array $licensing)
    {
        foreach ($licensing as $licensingInfo) {
            if (!$licensingInfo instanceof LicensingInfo) {
                throw new Exception(sprintf('Licensing info must be an instance of %s', LicensingInfo::class));
            }
        }

        $this->sessionId = $sessionId;
        $this->licensing = $licensing;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getLicensing(): array
    {
        return $this->licensing;
    }

    public function getProject(): ?string
    {
        return $this->project;
    }

    public function setProject(?string $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPurchaseOrder(): ?string
    {
        return $this->purchaseOrder;
    }

    public function setPurchaseOrder(?string $purchaseOrder): self
    {
        $this->purchaseOrder = $purchaseOrder;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(?string $other): self
    {
        $this->other = $other;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_session_id' => $this->getSessionId(),
            'dp_licensing' => array_map(function (LicensingInfo $licensing) {
                return [
                    'dp_item_id' => $licensing->getItemIds(),
                    'dp_option' => $licensing->getSize(),
                    'dp_license_id' => $licensing->getLicenseId(),
                    'dp_ext_options' => $licensing->getExtOption(),
                ];
            }, $this->getLicensing()),
            'dp_project' => $this->getProject(),
            'dp_client' => $this->getClient(),
            'dp_purchase_order' => $this->getPurchaseOrder(),
            'dp_isbn' => $this->getIsbn(),
            'dp_other' => $this->getOther(),
        ];
    }
}
