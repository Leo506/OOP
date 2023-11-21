<?php

namespace App\Dispatcher;

$virtualTable = []; // phpcs:disable

function defmethod($typeName, $methodName, $fn)
{
    global $virtualTable;
    if (!isset($virtualTable[$typeName])) {
        $virtualTable[$typeName] = [$methodName => $fn];
    } else {
        $virtualTable[$typeName][$methodName] = $fn;
    }
}

function call($obj, $fullMethodName, $args)
{
    global $virtualTable;
    $typeName = $obj['name'];
    $methodParts = explode('\\', $fullMethodName);
    $methodName = $methodParts[sizeof($methodParts) - 1];
    $fn = $virtualTable[$typeName][$methodName] ?? null;
    if (!$fn) {
        return null;
    }

    return $fn($obj, ...$args);
}
