<?php

namespace App;

class HTMLDivElement extends HTMLPairElement
{

    public function __construct(array $attributes = [])
    {
        parent::__construct('div', $attributes);
    }
}
