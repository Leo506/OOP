<?php

namespace App;

class HTMLElement
{
    private $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttribute(string $attribute): string
    {
        return $this->attributes[$attribute];
    }

    public function addClass(string $class): void
    {
        $classes = $this->getClasses();
        $classes[] = $class;
        $classes = collect($classes)
            ->unique()
            ->toArray();
        $this->attributes['class'] = self::getClassesString($classes);
    }

    public function removeClass(string $class): void
    {
        $classes = collect($this->getClasses())
            ->filter(fn ($item) => $item != $class)
            ->toArray();
        $this->attributes['class'] = self::getClassesString($classes);
    }

    public function toggleClass(string $class): void
    {
        $classes = collect($this->getClasses());
        if ($classes->contains($class))
            $this->removeClass($class);
        else
            $this->addClass($class);
    }

    private function getClasses(): array
    {
        return explode(' ', $this->attributes['class']);
    }

    private static function getClassesString(array $classes): string
    {
        return join(' ', $classes);
    }

    protected function stringifyAttributes()
    {
        return collect($this->attributes)
            ->map(fn ($item, $key) => $key . "=\"" . $item . "\"")
            ->join(' ');
    }
}
