<?php

$point1 = [0, 0];
$point2 = [3, 4];
print calculateDistance($point1, $point2);
print "<br>";

$point3 = [-1, -4];
$point4 = [-1, -10];
print calculateDistance($point3, $point4);
print "<br>";

$point3 = [1, 10];
$point4 = [1, 3];
print calculateDistance($point3, $point4);

function calculateDistance(array $point1, array $point2): float {
    $xDiff = $point2[0] - $point1[0];
    $yDiff = $point2[1] - $point1[1];
    return sqrt($xDiff * $xDiff + $yDiff * $yDiff);
}