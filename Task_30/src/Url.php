<?php

namespace App;

class Url
{
    private array $urlData;

    public function __construct(string $url)
    {
        $this->urlData = parse_url($url);
        $queryParams = [];
        parse_str($this->urlData['query'] ?? '', $queryParams);
        $this->urlData['query'] = [];
        foreach ($queryParams as $key=>$value)
            $this->setQueryParam($this->urlData, $key, $value);
    }

    private function setQueryParam(array &$data, string $key, ?string $value): void
    {
        if ($value === null) {
            unset($data['query'][$key]);
            return;
        }
        
        $data['query'][$key] = $value;
    }

    public function getScheme(): ?string {
        return $this->urlData['scheme'] ?? NULL;
    }

    public function getHostName(): ?string {
        return $this->urlData['host'] ?? NULL;
    }

    public function getQueryParams(): ?array {
        return $this->urlData['query'] ?? NULL;
    }

    public function getQueryParam(string $key, mixed $default = null): ?string {
        return $this->urlData['query'][$key] ?? $default;
    }

    public function equals(Url $url): bool {
        return $this == $url;
    }
}
