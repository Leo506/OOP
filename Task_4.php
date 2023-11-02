<?php

$point1 = makePoint(3, 2);
$point2 = makePoint(0, 0);
$point3 = makePoint(3, -5);
$point4 = makePoint(0, -5);
print(isParallelWithY(makeSegment($point1, $point2))?"true":"false");
print "<br>";
print(isParallelWithY(makeSegment($point1, $point3))?"true":"false");
print "<br>";
print(isParallelWithX(makeSegment($point2, $point3))?"true":"false");
print "<br>";
print(isParallelWithX(makeSegment($point3, $point4))?"true":"false");

function makePoint(float $x, float $y): array
{
    $r = sqrt($x * $x + $y * $y);
    $fi = atan2($y, $x);
    return [
        'r' => $r,
        'fi' => $fi
    ];
}

function getX(array $point): float
{
    return $point['r'] * cos($point['fi']);
}

function getY(array $point): float
{
    return $point['r'] * sin($point['fi']);
}

function makeSegment($point1, $point2)
{
    return ['beginPoint' => $point1, 'endPoint' => $point2];
}

function getBeginPoint($segment)
{
    return $segment['beginPoint'];
}

function getEndPoint($segment)
{
    return $segment['endPoint'];
}

function isParallelWithX($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    return getY($beginPoint) === getY($endPoint);
}

function isParallelWithY($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);

    return getX($beginPoint) === getX($endPoint);
}
