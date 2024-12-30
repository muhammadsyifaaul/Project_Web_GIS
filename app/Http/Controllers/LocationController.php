<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil input untuk pagination dan search
        $search = $request->input('search');
        $entries = $request->input('entries', 10); // Default 10 entries per page

        // Mengambil data lokasi dari database dengan pencarian dan pagination
        $query = Location::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        }

        $locations = $query->paginate($entries);

        // Mengirimkan data ke view dashboard
        return view('admin.dashboard', [
            'locations' => $locations,
            'search' => $search,
            'entries' => $entries,
        ]);
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

        $photoPath = $request->hasFile('photo') 
            ? $request->file('photo')->store('uploads', 'public') 
            : null;

        $address = $this->getAddressFromCoordinates($request->latitude, $request->longitude);

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
        $client = new Client();
        $apiKey = env('OPENCAGE_API_KEY');
        $url = "https://api.opencagedata.com/geocode/v1/json?q={$latitude}+{$longitude}&key={$apiKey}";

        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return $data['results'][0]['formatted'] ?? 'Address not found';
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.edit-location', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $location = Location::findOrFail($id);

        $photoPath = $location->photo;
        if ($request->hasFile('photo')) {
            // Hapus file lama
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            // Simpan file baru
            $photoPath = $request->file('photo')->store('uploads', 'public');
        }

        $location->update([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photo' => $photoPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Location updated successfully!');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        if ($location->photo) {
            Storage::disk('public')->delete($location->photo);
        }
        $location->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Location deleted successfully!');
    }

    public function getRoute(Request $request)
    {
        $userLatitude = $request->input('user_latitude');
        $userLongitude = $request->input('user_longitude');
        $destinationLatitude = $request->input('destination_latitude');
        $destinationLongitude = $request->input('destination_longitude');

        // Generate Google Maps link with routing
        $url = "https://www.google.com/maps/dir/?api=1&origin={$userLatitude},{$userLongitude}&destination={$destinationLatitude},{$destinationLongitude}&travelmode=driving";

        return redirect($url);
    }
}
