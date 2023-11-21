<?php

namespace App\Square;

use function App\Dispatcher\defmethod;

function init()
{
    defmethod(__NAMESPACE__, 'getArea', function ($self) {
        return getSide($self) * getSide($self);
    });
}


function make($side)
{
    return [
        'name' => __NAMESPACE__,
        'data' => [
            'side' => $side
        ]
    ];
}

function getSide($self)
{
    return $self['data']['side'];
}
