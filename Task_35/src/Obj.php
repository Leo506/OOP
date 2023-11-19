<?php

namespace App;

use ArrayAccess;

class Obj implements ObjInterface, ArrayAccess
{
    private array $fields = [];

    public function __construct(array $fields)
    {
        foreach ($fields as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function __get($key)
    {
        return $this->fields[$key];
    }

    public function __set($key, $value)
    {
        if (is_array($value))
            $this->fields[$key] = new Obj($value);
        else
            $this->fields[$key] = $value;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->fields[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->fields[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->fields[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->fields[$offset]);
    }
}
