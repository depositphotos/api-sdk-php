<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Search\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class SearchRequest implements RequestInterface
{
    private const COMMAND_NAME = 'search';

    /** @var string */
    private $query;

    /** @var int */
    private $limit;

    /** @var int */
    private $offset;

    /** @var null|string */
    private $hash;

    /** @var null|int */
    private $sort;

    /** @var null|string */
    private $color;

    /** @var null|bool */
    private $nudity;

    /** @var null|int */
    private $illustration;

    /** @var null|int */
    private $user;

    /** @var null|string */
    private $username;

    /** @var null|string */
    private $orientation;

    /** @var null|string */
    private $size;

    /** @var array */
    private $keywords = [];

    /** @var null|bool */
    private $photo;

    /** @var null|bool */
    private $vector;

    /** @var null|bool */
    private $video;

    /** @var null|bool */
    private $audio;

    /** @var null|bool */
    private $music;

    /** @var null|bool */
    private $soundEffect;

    /** @var null|bool */
    private $editorial;

    /** @var null|string */
    private $trackingUrl;

    /** @var null|string */
    private $countryExcluded;

    /** @var null|bool */
    private $translateItems;

    /** @var null|string */
    private $lang;

    /** @var null|bool */
    private $correction;

    /** @var null|int */
    private $height;

    /** @var null|int */
    private $width;

    /** @var null|string */
    private $imageUrl;

    /** @var null|string */
    private $gender;

    /** @var null|int */
    private $age;

    /** @var null|string */
    private $race;

    /** @var null|string */
    private $quantity;

    public function __construct(string $query, int $limit, int $offset)
    {
        $this->query = $query;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(?int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getNudity(): ?bool
    {
        return $this->nudity;
    }

    public function setNudity(?bool $nudity): self
    {
        $this->nudity = $nudity;

        return $this;
    }

    public function getIllustration(): ?int
    {
        return $this->illustration;
    }

    public function setIllustration(?int $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(?int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(?string $orientation): self
    {
        $this->orientation = $orientation;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function setKeywords(array $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getPhoto(): ?bool
    {
        return $this->photo;
    }

    public function setPhoto(?bool $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getVector(): ?bool
    {
        return $this->vector;
    }

    public function setVector(?bool $vector): self
    {
        $this->vector = $vector;

        return $this;
    }

    public function getVideo(): ?bool
    {
        return $this->video;
    }

    public function setVideo(?bool $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getAudio(): ?bool
    {
        return $this->audio;
    }

    public function setAudio(?bool $audio): void
    {
        $this->audio = $audio;
    }

    public function getMusic(): ?bool
    {
        return $this->music;
    }

    public function setMusic(?bool $music): void
    {
        $this->music = $music;
    }

    public function getSoundEffect(): ?bool
    {
        return $this->soundEffect;
    }

    public function setSoundEffect(?bool $soundEffect): void
    {
        $this->soundEffect = $soundEffect;
    }

    public function getEditorial(): ?bool
    {
        return $this->editorial;
    }

    public function setEditorial(?bool $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    public function setTrackingUrl(?string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }

    public function getCountryExcluded(): ?string
    {
        return $this->countryExcluded;
    }

    public function setCountryExcluded(?string $countryExcluded): self
    {
        $this->countryExcluded = $countryExcluded;

        return $this;
    }

    public function getTranslateItems(): ?bool
    {
        return $this->translateItems;
    }

    public function setTranslateItems(?bool $translateItems): self
    {
        $this->translateItems = $translateItems;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(?string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getCorrection(): ?bool
    {
        return $this->correction;
    }

    public function setCorrection(?bool $correction): self
    {
        $this->correction = $correction;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_search_query' => $this->getQuery(),
            'dp_search_hash' => $this->getHash(),
            'dp_search_sort' => $this->getSort(),
            'dp_search_limit' => $this->getLimit(),
            'dp_search_offset' => $this->getOffset(),
            'dp_search_color' => $this->getColor(),
            'dp_search_nudity' => $this->getNudity(),
            'dp_illustration' => $this->getIllustration(),
            'dp_search_user' => $this->getUser(),
            'dp_search_username' => $this->getUsername(),
            'dp_search_orientation' => $this->getOrientation(),
            'dp_search_imagesize' => $this->getSize(),
            'dp_exclude_keywords' => !empty($this->getKeywords()) ? implode(',', $this->getKeywords()) : null,
            'dp_search_photo' => $this->getPhoto(),
            'dp_search_vector' => $this->getVector(),
            'dp_search_video' => $this->getVideo(),
            'dp_search_audio' => $this->getAudio(),
            'dp_search_music' => $this->getMusic(),
            'dp_search_sound_effect' => $this->getSoundEffect(),
            'dp_search_editorial' => $this->getEditorial(),
            'dp_tracking_url' => $this->getTrackingUrl(),
            'dp_country_excluded' => $this->getCountryExcluded(),
            'dp_translate_items' => $this->getTranslateItems(),
            'dp_lang' => $this->getLang(),
            'dp_search_correction' => $this->getCorrection(),
            'dp_search_height' => $this->getHeight(),
            'dp_search_width' => $this->getWidth(),
            'dp_image_url' => $this->getImageUrl(),
            'dp_search_gender' => $this->getGender(),
            'dp_search_age' => $this->getAge(),
            'dp_search_race' => $this->getRace(),
            'dp_search_quantity' => $this->getQuantity(),
        ];
    }
}
