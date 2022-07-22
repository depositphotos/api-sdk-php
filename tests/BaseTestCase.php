<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Tests;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    private const FIXTURE_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'Fixtures';

    /** @var array */
    private $fixtures = [];

    public function loadFixtures(string $path, string $delimiter = '.'): void
    {
        $path = str_replace($delimiter, DIRECTORY_SEPARATOR, $path);
        $filepath = implode(DIRECTORY_SEPARATOR, [self::FIXTURE_PATH, $path . '.json']);

        if (!file_exists($filepath)) {
            throw new \Exception(sprintf('Fixture file not found: %s', $filepath));
        }

        $data = json_decode(file_get_contents($filepath), true);
        if (json_last_error()) {
            throw new \Exception(sprintf('Not valid json in fixture file %s', $filepath));
        }

        $this->fixtures = $data;
    }

    public function getFixture(string $name, string $delimiter = '.')
    {
        if (array_key_exists($name, $this->fixtures)) {
            return $this->fixtures[$name];
        }

        $fixtures = $this->fixtures;
        foreach (explode($delimiter, $name) as $segment) {
            if (array_key_exists($segment, $fixtures)) {
                $fixtures = $fixtures[$segment];
            } else {
                return null;
            }
        }

        return $fixtures;
    }
}
