<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Regular\Tools\Request\RemoveBg;

use GuzzleHttp\Psr7\Utils;

class File implements ImageInterface
{
    /** @var resource */
    private $file;

    public function __construct(string $filePath)
    {
        $this->file = Utils::tryFopen($filePath, 'r');
    }

    public function getName(): string
    {
        return 'dp_image_file';
    }

    public function getValue()
    {
        return $this->file;
    }
}
