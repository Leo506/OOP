<?php

namespace App;

class HTMLHrElement extends HTMLElement {
    public function __toString()
    {
        $attributes = $this->stringifyAttributes();
        return '<hr' . ($attributes === '' ? '' : ' ' . $attributes) . '>';
    }
}
