<?php
declare(strict_types=1);

namespace Depositphotos\SDK\Resource;

use Depositphotos\SDK\Exception\Exception as SDKException;

class ResponseObject
{
    /** @var array */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function cast(string $class): ResponseObject
    {
        if (is_subclass_of($class, __CLASS__)) {
            return new $class($this->data);
        }

        throw new SDKException('Cannot cast to an object');
    }

    /**
     * @return mixed
     */
    protected function getProperty(string $name, string $class = null)
    {
        $value = $this->data[$name] ?? null;

        if (is_array($value) && $class) {
            if ($this->isList($value)) {
                return array_map(function ($raw) use ($class) {
                    return (new ResponseObject((array) $raw))->cast($class);
                }, $value);
            }

            return (new ResponseObject($value))->cast($class);
        }

        return $value;
    }

    protected function getDateTime(string $name): \DateTimeInterface
    {
        $dateTime = $this->getDateTimeOrNull($name);

        if ($dateTime) {
            return $dateTime;
        }

        throw new SDKException(sprintf('Сannot create DateTime object for "%s" field', $name));
    }

    protected function getDateTimeOrNull(string $name): ?\DateTimeInterface
    {
        $value = $this->data[$name] ?? null;

        if (is_numeric($value)) {
            return (new \DateTime())->setTimestamp((int) $value);
        }

        if ($value) {
            try {
                return new \DateTime((string)$value);
            } catch (\Exception $e) {

            }
        }

        return null;
    }

    protected function isList(array $data): bool
    {
        return $data === [] || (array_keys($data) === range(0, count($data) - 1));
    }
}
