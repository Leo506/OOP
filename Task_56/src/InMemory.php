<?php

namespace App;

class InMemory implements StorageInterface
{
    private $elements = [];

    public function get($key)
    {
        return $this->elements[$key];
    }

    public function set($key, $value)
    {
        return $this->elements[$key] = $value;
    }

    public function count()
    {
        return count($this->elements);
    }
}
