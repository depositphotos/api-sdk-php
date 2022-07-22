<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Legals\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetLegalDocumentRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getLegalDocument';

    /** @var string */
    private $legalName;

    /** @var null|string */
    private $lang;

    public function __construct(string $legalName, ?string $lang = null)
    {
        $this->legalName = $legalName;
        $this->lang = $lang;
    }

    public function getLegalName(): string
    {
        return $this->legalName;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_legal_name' => $this->getLegalName(),
            'dp_lang' => $this->getLang(),
        ];
    }
}
