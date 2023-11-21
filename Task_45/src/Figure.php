<?php

namespace App\Figure;

use App\Dispatcher;

function getArea($self, ...$args)
{
    return Dispatcher\call($self, __FUNCTION__, $args);
}
