<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
