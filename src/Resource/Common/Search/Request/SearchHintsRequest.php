<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class SearchHintsRequest implements RequestInterface
{
    private const COMMAND_NAME = 'searchHint';

    /** @var string */
    private $prefix;

    /** @var string */
    private $language;

    public function __construct(string $prefix, string $language)
    {
        $this->prefix = $prefix;
        $this->language = $language;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_search_prefix' => $this->getPrefix(),
            'dp_language' => $this->getLanguage(),
        ];
    }
}
