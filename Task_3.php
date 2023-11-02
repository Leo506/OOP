<?php
function makeDecartPoint($x, $y)
{
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX($point)
{
    return $point['x'];
}

function getY($point)
{
    return $point['y'];
}

function makeSegment(array $beginPoint, array $endPoint): array {
    return [
        "beginPoint" => $beginPoint,
        "endPoint" => $endPoint
    ];
}

function getBeginPoint(array $segment): array {
    return $segment['beginPoint'];
}

function getEndPoint(array $segment): array {
    return $segment['endPoint'];
}

function getMidpointOfSegment(array $segment): array {
    
    $getMidpoint = function (array $point1, array $point2): array {
        $x = ($point1['x'] + $point2['x']) / 2;
        $y = ($point1['y'] + $point2['y']) / 2;
        return [
            'x' => $x,
            'y' =>  $y
        ];
    };

    return $getMidpoint(getBeginPoint($segment), getEndPoint($segment));
}

$beginPoint = makeDecartPoint(3, 2);
$endPoint = makeDecartPoint(0, 0);
$segment = makeSegment($beginPoint, $endPoint);
print_r(getBeginPoint($segment));
print "<br>";

print_r(getEndPoint($segment));
print "<br>";

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));
print_r(getMidpointOfSegment($segment));
print "<br>";

$segment2 = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(2, 3));
print_r(getMidpointOfSegment($segment2));