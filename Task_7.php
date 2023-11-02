<?php

$url = make('https://ht.io/community?q=low');
print ('https://ht.io/community?q=low' === toString($url)) ? "true" : "false";
print "<br>";
print ('https' === getScheme($url)) ? "true" : "false";
print "<br>";
print ('ht.io' === getHost($url)) ? "true" : "false";
print "<br>";
print ('/community' === getPath($url)) ? "true" : "false";
print "<br>";

setScheme($url, 'http');
print ('http://ht.io/community?q=low' === toString($url)) ? "true" : "false";
print "<br>";

setHost($url, 'code-basics.com');
print ('http://code-basics.com/community?q=low' === toString($url)) ? "true" : "false";
print "<br>";

setScheme($url, 'https');
setHost($url, 'ht.io');
setPath($url, '/404');
print ('https://ht.io/404?q=low' === toString($url)) ? "true" : "false";
print "<br>";

setQueryParam($url, 'page', 5); 
print ('https://ht.io/404?q=low&page=5' === toString($url)) ? "true" : "false";
print "<br>";

setQueryParam($url, 'q', 'high');
print ('https://ht.io/404?q=high&page=5' === toString($url)) ? "true" : "false";
print "<br>";
print ('high' === getQueryParam($url, 'q')) ? "true" : "false";
print "<br>";
print ('guest' === getQueryParam($url, 'user', 'guest')) ? "true" : "false";
print "<br>";
print is_null(getQueryParam($url, 'b')) ? "true" : "false";
print "<br>";

setQueryParam($url, 'q', null);
print ('https://ht.io/404?page=5' === toString($url)) ? "true" : "false";
print "<br>";

setQueryParam($url, 'q', null);
print ('https://ht.io/404?page=5' === toString($url)) ? "true" : "false";
print "<br>";

$url = make('https://ht.io/community');
print ('https://ht.io/community' === toString($url)) ? "true" : "false";
print "<br>";

$url = make('https://ht.io/?q=high&page=5');
print ('https://ht.io/?q=high&page=5' === toString($url)) ? "true" : "false";
print "<br>";


function make(string $url): array
{
    $data = parse_url($url);
    $queryParams = [];
    parse_str($data['query'] ?? '', $queryParams);
    $data['query'] = [];
    foreach ($queryParams as $key=>$value)
        setQueryParam($data, $key, $value);
    return $data;
}

function setScheme(array &$data, string $scheme): void
{
    $data['scheme'] = $scheme;
}

function getScheme(array $data): string
{
    return $data['scheme'];
}

function setHost(array &$data, string $host): void
{
    $data['host'] = $host;
}

function getHost(array $data): string
{
    return $data['host'];
}

function setPath(array &$data, string $path): void
{
    $data['path'] = $path;
}

function getPath(array $data): string
{
    return $data['path'];
}

function setQueryParam(array &$data, string $key, ?string $value): void
{
    if ($value === null) {
        unset($data['query'][$key]);
        return;
    }

    if (empty($data['query']))
        $data['query'] = [
            $key => $value
        ];    
    else
        $data['query'][$key] = $value;
}

function getQueryParam(array $data, string $key, string $default = null): ?string
{

    if (empty($data['query']))
        return $default;
    return $data['query'][$key] ?? $default;
}

function toString(array $data): string
{
    $url = $data['scheme'] . '://' . $data['host'] . $data['path'];
    if (!empty($data['query'])) {
        $url .= '?' . join('&', array_map('mapper', array_keys($data['query']), array_values($data['query'])));
    }

    return $url;
}

function mapper(string $key, string $value): string {
    return $key . '=' . $value;
}
