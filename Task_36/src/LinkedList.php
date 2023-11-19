<?php

namespace App\LinkedList;

use App\Node;

function reverse(Node $node): Node {
    $previous = null;
    while ($node !== null) {
        $new = new Node($node->getValue(), $previous);
        $previous = $new;
        $node = $node->getNext();
    }

    return $previous;
}