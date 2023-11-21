<?php

namespace App\tags;

class LabelTag implements TagInterface
{

    private TagInterface $innerTag;
    private string $text;

    public function __construct(string $text, TagInterface $innerTag)
    {
        $this->innerTag = $innerTag;
        $this->text = $text;
    }

    public function render()
    {
        return '<label>' . $this->text . $this->innerTag->render() . '</label>';
    }

    public function __toString()
    {
        return $this->render();
    }
}
