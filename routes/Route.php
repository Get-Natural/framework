<?php

Route::set('/', function (){
    Controller::index();
});
 Route::set('/about', function (){
     Controller::about();
 });
