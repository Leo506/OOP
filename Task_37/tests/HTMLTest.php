<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\HTML\getLinks;

class HTMLTest extends TestCase
{
    public function testGetLinks1()
    {
        $tags = [];
        $links = getLinks($tags);

        $expected = [];
        $this->assertEquals($expected, $links);
    }

    public function testGetLinks2()
    {
        $tags = [
            ['name' => 'p'],
            ['name' => 'a', 'href' => 'ht.io'],
            ['name' => 'img', 'src' => 'ht.io/assets/logo.png'],
        ];
        $links = getLinks($tags);

        $expected = [
            'ht.io',
            'ht.io/assets/logo.png'
        ];
        $this->assertEquals($expected, $links);
    }

    public function testGetLinks3()
    {
        $tags = [
            ['name' => 'img', 'src' => 'ht.io/assets/logo.png'],
            ['name' => 'div'],
            ['name' => 'link', 'href' => 'ht.io/assets/style.css'],
            ['name' => 'h1']
        ];
        $links = getLinks($tags);

        $expected = [
            'ht.io/assets/logo.png',
            'ht.io/assets/style.css'
        ];
        $this->assertEquals($expected, $links);
    }
}
