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
        $search = $request->input('search');
        $entries = $request->input('entries', 10);
        $query = Location::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
        }

        $locations = $query->paginate($entries);

        return view('dashboard', [
            'locations' => $locations,
            'search' => $search,
            'entries' => $entries,
        ]);
    }
}
