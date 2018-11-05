<?php
use Natural\App\Views\View;

Route::set('/', function (){
    Controller::index();
});
 Route::set('/about', function (){
     Controller::about();
 });
