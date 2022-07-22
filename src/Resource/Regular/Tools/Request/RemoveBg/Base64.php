<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg;

class Base64 implements ImageInterface
{
    /** @var string */
    private $base64;

    public function __construct(string $base64)
    {
        $this->base64 = $base64;
    }

    public function getName(): string
    {
        return 'dp_image_base64';
    }

    public function getValue()
    {
       return $this->base64;
    }
}
