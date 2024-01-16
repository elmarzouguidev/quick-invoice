<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        //return view('Home.index');

        return Inertia::render('Home/Index');
    }
}
