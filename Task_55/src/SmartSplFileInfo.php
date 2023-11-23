<?php

namespace App;

use SplFileInfo;

class SmartSplFileInfo extends SplFileInfo
{

    public function getSize(string $units = 'B'): int|false
    {
        $strategies = [
            'b' => fn () => parent::getSize() * 8,
            'B' => fn () => parent::getSize()
        ];
        return isset($strategies[$units])
            ? $strategies[$units]()
            : throw new \Exception();
    }
}
