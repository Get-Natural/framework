<?php
use Natural\Helpers\BaseHelper as BaseHelper;
use Natural\Views\View;


function dumper($data) {
    return BaseHelper::dumper($data);
}

function dump_exit($data) {
    return BaseHelper::dump_exit($data);
}

function view($view, $data = []) {
    $compiler = new View;
    $compiler->make($view, $data);
}

function route($name) {
    return App\Routing\Route::getRouteByName($name);
}
