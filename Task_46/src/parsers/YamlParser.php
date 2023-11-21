<?php

namespace App\parsers;

use Symfony\Component\Yaml\Yaml;

class YamlParser
{

    public function parse(string $data): array
    {
        return Yaml::parse($data);
    }
}
