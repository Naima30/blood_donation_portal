<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EmergencyController extends Controller
{
    public function create()
    {
        return view('emergency.request');
    }

    public function requestBlood(Request $request)
    {
        $request->validate([
            'blood_group' => 'required',
            'location'    => 'required',
        ]);

        // 🔍 Geocode hospital/location
        $geoResponse = Http::withHeaders([
            'User-Agent' => 'BloodPortalApp'
        ])->get('https://nominatim.openstreetmap.org/search', [
            'q'      => $request->location,
            'format' => 'json',
            'limit'  => 1,
        ]);

        $geoData = $geoResponse->json();

        if (empty($geoData)) {
            return back()->with('error', 'Location not found.');
        }

        $hospitalLat = (float) $geoData[0]['lat'];
        $hospitalLng = (float) $geoData[0]['lon'];

        // 📍 Haversine Formula (Proper Binding)
        $donors = Donor::with('user') // 👈 ADD THIS
    ->selectRaw("
        donors.*,
        (6371 * acos(
            cos(radians(?)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(latitude))
        )) AS distance
    ", [$hospitalLat, $hospitalLng, $hospitalLat])
    ->where('blood_group', $request->blood_group)
    ->orderBy('distance', 'asc')
    ->paginate(5);
    session([
    'hospitalLat' => $hospitalLat,
    'hospitalLng' => $hospitalLng,
    'bloodGroup'  => $request->blood_group,
]);

        if ($request->has('page')) {
    return view('emergency.partials.donors', compact('donors'))->render();
}

        return view('emergency.request', compact('donors'));
    }

    // Store emergency request (NO LOGIN)
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'blood_group'  => 'required|string|max:10',
            'location'     => 'required|string|max:255',
            'contact_number' => 'required|string|max:50',
        ]);

        DB::table('emergency_requests')->insert([
            'patient_name' => $request->patient_name,
            'blood_group'  => $request->blood_group,
            'contact'      => $request->contact_number,
            'details'      => $request->location,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect('/emergency/request')
            ->with('success', 'Emergency request submitted successfully. Help is on the way.');
    }
    public function loadMore(Request $request)
{
    $hospitalLat = session('hospitalLat');
    $hospitalLng = session('hospitalLng');
    $bloodGroup  = session('bloodGroup');

    $donors = Donor::selectRaw("
        donors.*,
        (6371 * acos(
            cos(radians(?)) *
            cos(radians(latitude)) *
            cos(radians(longitude) - radians(?)) +
            sin(radians(?)) *
            sin(radians(latitude))
        )) AS distance
    ", [$hospitalLat, $hospitalLng, $hospitalLat])
    ->where('blood_group', $bloodGroup)
    ->orderBy('distance', 'asc')
    ->paginate(5);

    return view('emergency.partials.donors', compact('donors'))->render();
}
}