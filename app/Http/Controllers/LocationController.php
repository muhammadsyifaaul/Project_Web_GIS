<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.dashboard', compact('locations'));
    }

    public function create()
    {
        return view('admin.create-location');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
        }

        // Gunakan fungsi untuk mendapatkan alamat
        $address = $this->getAddressFromCoordinates($request->latitude, $request->longitude);

        // Simpan data lokasi ke database
        Location::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $address,
            'photo' => $photoPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Location added successfully!');
    }

    private function getAddressFromCoordinates($latitude, $longitude)
    {
        // Gunakan Guzzle untuk melakukan request ke OpenCage API
        $client = new Client();
        $apiKey = env('OPENCAGE_API_KEY');
        $url = "https://api.opencagedata.com/geocode/v1/json?q={$latitude}+{$longitude}&key={$apiKey}";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        // Ambil alamat dari respons
        if (isset($data['results'][0]['formatted'])) {
            return $data['results'][0]['formatted'];
        }

        return 'Address not found';
    }
}
