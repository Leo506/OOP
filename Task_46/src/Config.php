<?php

namespace App;

class Config
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __get($key)
    {
        $result = $this->data[$key];
        if (is_array($result) === false) {
            return $result;
        }
        return new self($result);
    }
}
