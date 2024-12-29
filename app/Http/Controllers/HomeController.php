<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Mengambil data lokasi dari database
        $locations = Location::all();

        // Mengirimkan data ke view dashboard
        return view('dashboard', [
            'locations' => $locations,
            'userLatitude' => $request->input('user_latitude'),
            'userLongitude' => $request->input('user_longitude'),
        ]);
    }
}
