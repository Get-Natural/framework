<?php
use Natural\Routing\Route;

Route::get('/', function (){
    return view('welcome');
}, 'index');

Route::get('/about', function (){
 return view('about');
},'about');

Route::get('/contact', function (){
    return view('contact');
},'contact');
