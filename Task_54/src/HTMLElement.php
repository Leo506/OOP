<?php

namespace App;

class HTMLElement
{
    public $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    protected function stringifyAttributes()
    {
        if (count($this->attributes) === 0) {
            return '';
        }
        $line = collect($this->attributes)
            ->map(function ($item, $key) {
                return "{$key}=\"{$item}\"";
            })
            ->join(' ');
        return " {$line}";
    }
}
