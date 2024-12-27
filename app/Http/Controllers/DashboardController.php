<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
    if (!Auth::check()) {
        // Otomatis login untuk user biasa
        Auth::loginUsingId(1); // Asumsikan ID 1 adalah user biasa
    }

    return view('dashboard');
}


?>