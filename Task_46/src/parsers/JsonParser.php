<?php

namespace App\parsers;

class JsonParser
{

    public function parse(string $data): array
    {
        return json_decode($data, true);
    }
}
