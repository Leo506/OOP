<?php

namespace App\Converter;

use stdClass;

function toStd(array $data) : stdClass {
    $result = new stdClass();
    foreach ($data as $key => $value) {
        $result->$key = $value;
    }

    return $result;
}