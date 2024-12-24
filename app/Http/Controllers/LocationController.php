<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function showLocationAndDistance()
    {
        // Koordinat pengguna (contoh)
        $userLatitude = -7.101506; 
        $userLongitude = 110.409702;

        // Koordinat tujuan (contoh)
        $targetLatitude = -7.005145; 
        $targetLongitude = 110.438125;

        // Gunakan fungsi helper untuk mendapatkan lokasi dan jarak
        $location = getLocation($userLatitude, $userLongitude);
        $distance = calculateDistance($userLatitude, $userLongitude, $targetLatitude, $targetLongitude);

        // Kirim data ke view
        return view('location', [
            'location' => $location,
            'distance' => $distance
        ]);
    }
}
