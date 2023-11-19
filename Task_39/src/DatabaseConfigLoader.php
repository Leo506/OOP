<?php

namespace App;

class DatabaseConfigLoader {
    private string $dir;

    public function __construct(string $dir) {
        $this->dir = $dir;
    }

    public function load(string $env): array {
        $file = $this->dir . '/database.' . $env . '.json';

        $json = file_get_contents($file);

        $config = json_decode($json, true);
        if (isset($config['extend'])) {
            $config = array_merge($this->load($config['extend']), $config);
            unset($config['extend']);
        }

        return $config;
    }
}