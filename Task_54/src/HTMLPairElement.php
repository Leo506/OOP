<?php

namespace App;

class HTMLPairElement extends HTMLElement
{
    private string $tag;
    private string $content = '';

    public function __construct(string $tag, array $attributes = [])
    {
        parent::__construct($attributes);
        $this->tag = $tag;
    }

    public function getTextContent()
    {
        return $this->content;
    }

    public function setTextContent(string $body)
    {
        $this->content = $body;
    }

    public function __toString()
    {
        return '<' . $this->tag . $this->stringifyAttributes() . '>' . $this->content . '</' . $this->tag . '>';
    }
}
