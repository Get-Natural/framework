<?php
use Natural\Helpers\BaseHelper as BaseHelper;
use Natural\App\Views\View;

function dump($data) {
    return BaseHelper::dump($data);
}

function dump_exit($data) {
    return BaseHelper::dump_exit($data);
}

function view($view, $data = []) {
    return View::make($view, $data);
}
