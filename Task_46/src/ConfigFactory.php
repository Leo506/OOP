<?php

namespace App;

use App\parsers\JsonParser;
use App\parsers\YamlParser;

class ConfigFactory
{
    public static function build(string $configPath): Config
    {
        $content = file_get_contents($configPath);
        $parser = self::getParserFor($configPath);
        return new Config($parser->parse($content));
    }

    private static function getParserFor(string $configPath): mixed {
        $fileExtension = pathinfo($configPath)['extension'];
        $parsersFactories = [
            'json' => fn() => new JsonParser(),
            'yaml' => fn() => new YamlParser(),
            'yml' => fn() => new YamlParser()
        ];
        return $parsersFactories[$fileExtension]() ?? null;
    }
}
