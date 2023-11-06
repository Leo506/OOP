<?php

namespace App;

class Truncater
{
    const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];

    private array $options;

    public function __construct(?array $options = null)
    {
        if ($options !== null) {
            $this->options = array_merge(self::OPTIONS, $options);
        } else {
            $this->options = self::OPTIONS;
        }
    }

    public function truncate(string $str, ?array $options = null): string
    {
        $scopedOptions = $this->options;
        if ($options !== null)
            $scopedOptions = array_merge($scopedOptions, $options);

        if (strlen($str) <= $scopedOptions['length'])
            return $str;

        return substr($str, 0, $scopedOptions['length']) . $scopedOptions['separator'];
    }
}
