<?php
namespace App;

class Rational
{
    private int $num;
    private int $denum;

    public function __construct(int $num, int $denum)
    {
        $this->num = $num;
        $this->denum = $denum;
    }

    function getNumer(): int
    {
        return $this->num;
    }

    function getDenom(): int
    {
        return $this->denum;
    }

    function add(Rational $rational): Rational
    {
        $num = $this->num * $rational->denum + $rational->num * $this->denum;
        $denum = $this->denum * $rational->denum;
        return new Rational($num, $denum);
    }

    function sub(Rational $rational): Rational
    {
        $num = $this->num * $rational->denum - $rational->num * $this->denum;
        $denum = $this->denum * $rational->denum;
        return new Rational($num, $denum);
    }
}
