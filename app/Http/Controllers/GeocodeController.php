<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    public function index()
    {
        return view('geocode.index');
    }

    public function geocode(Request $request)
    {
        $address = $request->input('address');
        $apiKey = env('GOOGLE_MAPS_API_KEY');

        if (empty($address) || empty($apiKey)) {
            return back()->with('error', 'Address and Google Maps API key are required.');
        }

        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => urlencode($address),
            'key' => $apiKey,
        ]);

        if (!$response->successful() || empty($response->json('results'))) {
            return back()->with('error', 'Failed to geocode the address.');
        }

        $data = $response->json();

        return back()->with('data', $data['results'][0])->withInput();
    }
}
