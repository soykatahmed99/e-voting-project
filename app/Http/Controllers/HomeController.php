<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home.home-page');
    }
    public function voterLoginPage()
    {
        return view('website.voter.login-page');
    }
}
