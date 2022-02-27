<?php

declare(strict_types=1);

namespace App\Models\Dtos;

use Exception;
use DateTime;
use ReflectionProperty;
use ReflectionException;
use stdClass;

/**
 * Allows requiring strict types, requires php version >= 7.4.0
 */
abstract class Reflective
{
    /**
     * We care about fields only. Once passed will make input iterable and cast based on required type. The
     * downside, however, is that keys / property names must match, so any typo will be passed on. On
     * the other hand, this allows to declare and nest modes and cast is just applied accordingly.
     * @param array|stdClass $params
     * @throws Exception
     */
    public function __construct(array|stdClass $params)
    {
        $this->fill((array) $params);
    }

    /**
     * @param array $params
     * @throws Exception
     */
    protected final function fill(array $params): void
    {
        foreach ($params as $param => $value) {
            if (is_string($param) && property_exists($this, $param)) {
                $this->{$param} = $this->cast($param, $value);
            } else {
                throw new Exception("Have to declare property {$param} in class " . get_class($this));
            }
        }
    }

    /**
     * Override for specific cast
     * @param string $name
     * @param string $value
     * @return mixed
     * @throws ReflectionException
     */
    protected function cast(string $name, $value)
    {
        $type = $this->getReflectionProperty($name)->getType()->getName();
        if ($this->isBuiltIn($type)) {
            return new $type($value);
        } else {
            settype($value, $type);
            return $value;
        }
    }

    /**
     * @throws ReflectionException
     */
    protected function getReflectionProperty(string $propertyName): ReflectionProperty
    {
        return new ReflectionProperty($this, $propertyName);
    }

    /**
     * Check if type is one of the built-in ones. If it is built-in, then cast is simple
     * Otherwise it has to be instantiated specifically
     * @param string $type
     * @return bool
     */
    protected function isBuiltIn(string $type): bool
    {
       return !in_array($type, ['int', 'float', 'string', 'bool', 'array', 'object']);
    }

    public function toArray(): array
    {
        $array = (array) $this;
        foreach ($array as $key => $value) {
            if (is_object($value)) {
                if ($value instanceof Reflective) {
                    $array[$key] = $value->toArray();
                } elseif ($value instanceof DateTime) {
                    $array[$key] = $value->format('Y-m-d H:i:s');
                } else {
                    $array[$key] = (array) $value;
                }
            } elseif (is_array($value)) {
                foreach ($value as $internalKey => $internalValue) {
                    if ($internalValue instanceof Reflective) {
                        $array[$key][$internalKey] = $internalValue->toArray();
                    }
                }
            }
        }
        return $array;
    }

}
