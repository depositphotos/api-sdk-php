<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource\Common\Generic\Request;

use Depositphotos\SDK\Resource\RequestInterface;

class HelpRequest implements RequestInterface
{
    private const COMMAND_NAME = 'help';

    /** @var string */
    private $byCommand;

    public function __construct(string $byCommand)
    {
        $this->byCommand = $byCommand;
    }

    public function getByCommand(): string
    {
        return $this->byCommand;
    }

    public function toArray(): array
    {
        return [
            'dp_command' => self::COMMAND_NAME,
            'dp_by_command' => $this->getByCommand(),
        ];
    }
}
