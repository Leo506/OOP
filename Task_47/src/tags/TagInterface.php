<?php

namespace App\tags;

interface TagInterface
{
    public function render();
    public function __toString();
}
