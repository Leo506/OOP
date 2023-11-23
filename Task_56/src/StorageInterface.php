<?php

namespace App;

interface StorageInterface
{
    public function get($key);
    public function set($key, $value);
    public function count();
}
