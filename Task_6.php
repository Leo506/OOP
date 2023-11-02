<?php

$rat1 = makeRational(3, 9);
print ratToString($rat1) . "<br>";
$rat2 = makeRational(10, 3);
print ratToString($rat1) . "+" . ratToString($rat2) . "=" . ratToString(add($rat1, $rat2)) . "<br>";
print ratToString($rat1) . "-" . ratToString($rat2) . "=" . ratToString(sub($rat1, $rat2)) . "<br>";
$rat3 = makeRational(-4, 16);
print ratToString($rat3) . "<br>";
$rat4 = makeRational(12, 5);
print ratToString($rat3) . "+" . ratToString($rat4) . "=" . ratToString(add($rat3, $rat4)) . "<br>";
print ratToString($rat3) . "-" . ratToString($rat4) . "=" . ratToString(sub($rat3, $rat4)) . "<br>";
$rat5 = makeRational(3, -9);
print ratToString($rat5) . "<br>";



function makeRational(int $num, int $denum): array
{
    $gcd = gcd($num, $denum);
    if ($gcd !== 0) {
        $num /= $gcd;
        $denum /= $gcd;
    }

    return [
        'num' => $num,
        'denum' => $denum
    ];
}

function getNumer(array $rational): int
{
    return $rational['num'];
}

function getDenom(array $rational): int
{
    return $rational['denum'];
}

function add(array $rationalOne, array $rationalTwo): array
{
    $num = getNumer($rationalOne) * getDenom($rationalTwo) + getNumer($rationalTwo) * getDenom($rationalOne);
    $denum = getDenom($rationalOne) * getDenom($rationalTwo);
    return makeRational($num, $denum);
}

function sub(array $rationalOne, array $rationalTwo): array
{
    $num = getNumer($rationalOne) * getDenom($rationalTwo) - getNumer($rationalTwo) * getDenom($rationalOne);
    $denum = getDenom($rationalOne) * getDenom($rationalTwo);
    return makeRational($num, $denum);
}




/* Функция gcd находит наибольший общий делитель двух чисел
*/
function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}
/* Функция RatToString возвращает строковое представление числа
  (используется для отладки)
*/
function ratToString($rat)
{
    return getNumer($rat) . '/' . getDenom($rat);
}
