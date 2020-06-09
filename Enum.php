<?php

namespace App\Enums;

use Exception;
use ReflectionClass;

class Enum
{
    protected string $value;

    public function __construct(string $value)
    {
        if (! self::contains($value)) {
            throw new Exception('an enum instance must have a value set');
        }

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    /** Retrieve the value of an instance */
    public function get(): string
    {
        return $this->value;
    }

    /** Set the value on an instance */
    public function set(string $value): void
    {
        if (self::contains($value)) {
            $this->value = $value;
        }
    }

    /** Performs a truth comparison on an instance */
    public function is(string $value): bool
    {
        return $this->value === $value;
    }

    /** Returns if the enum value is present in values */
    public function in(array $values): bool
    {
        return in_array($this->value, $values);
    }

    /** Returns all elements of the Enum */
    public static function elements(): array
    {
        return array_values(
            (new ReflectionClass(
                get_called_class()
            ))
            ->getConstants()
        );
    }

    /** Check whether the Enum contains the element */
    public static function contains(string $element): bool
    {
        return in_array($element, self::elements());
    }
}
