<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware auth diterapkan
    }

    public function index()
    {
        return view('dashboard'); // View dashboard
    }
}
