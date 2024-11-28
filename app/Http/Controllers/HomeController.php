<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('blog');
    }
    public function users()
    {
        return view('users');
    }
    public function cart()
    {
        return view('cart.index');
    }
}
