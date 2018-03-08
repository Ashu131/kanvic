<?php


function isActiveRoute($route, $output = 'current-item')
{
    if (Route::currentRouteName() == $route || Request::is($route)) {
        return $output;
    }
    return '';
}

