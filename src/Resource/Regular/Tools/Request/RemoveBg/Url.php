<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg;

class Url implements ImageInterface
{
    /** @var string */
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getName(): string
    {
        return 'dp_image_url';
    }

    public function getValue()
    {
        return $this->url;
    }
}
