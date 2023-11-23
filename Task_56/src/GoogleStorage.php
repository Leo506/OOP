<?php

namespace App;

use Exception;

class GoogleStorage implements StorageInterface
{

    private array $storage = [];

    public function get($key)
    {
        return $this->storage[$key];
    }
    public function set($key, $value)
    {
        return $this->storage[$key] = $value;
    }
    public function count()
    {
        throw new Exception();
    }
}
