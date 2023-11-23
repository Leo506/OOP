<?php

namespace App;

class Base
{
    public function isInstanceOf(string $class): bool
    {
        if (get_class($this) === $class)
            return true;
        
        foreach (class_parents($this) as $parent) {
            if ($parent === $class)
                return true;
        }

        return false;
    }
}
