<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class GetMediaDataRequest implements RequestInterface
{
    private const COMMAND_NAME = 'getMediaData';

    /** @var int */
    private $itemId;

    /** @var bool */
    private $fullSimilar;

    /** @var bool */
    private $translateItems;

    /** @var null|string */
    private $lang;

    /** @var null|string */
    private $datetimeFormat;

    /** @var null|string */
    private $countryExcluded;

    public function __construct(
        int $itemId,
        bool $fullSimilar = false,
        bool $translateItems = false,
        ?string $lang = null,
        ?string $datetimeFormat = null,
        ?string $countryExcluded = null
    ) {
        $this->itemId = $itemId;
        $this->fullSimilar = $fullSimilar;
        $this->datetimeFormat = $datetimeFormat;
        $this->translateItems = $translateItems;
        $this->lang = $lang;
        $this->countryExcluded = $countryExcluded;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function withFullSimilar(): bool
    {
        return $this->fullSimilar;
    }

    public function withTranslateItems(): bool
    {
        return $this->translateItems;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function getDatetimeFormat(): ?string
    {
        return $this->datetimeFormat;
    }

    public function getCountryExcluded(): ?string
    {
        return $this->countryExcluded;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_media_id' => $this->getItemId(),
            'dp_full_similar' => $this->withFullSimilar(),
            'dp_translate_items' => $this->withTranslateItems(),
            'dp_lang' => $this->getLang(),
            'dp_datetime_format' => $this->getDatetimeFormat(),
            'dp_country_excluded' => $this->getCountryExcluded(),
        ];
    }
}
