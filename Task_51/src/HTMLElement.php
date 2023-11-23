<?php

namespace App;

class HTMLElement
{
    private $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    protected function stringifyAttributes()
    {
        return collect($this->attributes)
            ->map(fn ($item, $key) => $key . "=\"" . $item . "\"")
            ->join(' ');
    }
}
