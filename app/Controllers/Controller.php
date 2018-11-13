<?php
namespace App\Controllers;

class Controller {

    public static function index()
    {
        return view('welcome', compact('data'));
    }

    public static function about()
    {
        return view('about');
    }
}
