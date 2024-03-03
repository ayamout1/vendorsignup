<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    public function index()
    {
        // Assuming you've set up a 'suitecrm' connection in config/database.php
        $vendors = DB::connection('suitecrm')->table('vsf_vendornetwork as vn')
                    ->leftJoin('vsf_vendornetwork_cstm as vnc', 'vn.id', '=', 'vnc.id_c')
                    ->select('vn.id', 'vn.name', 'vnc.latitude_c', 'vnc.longitude_c')
                    ->get();

        return view('geocode.index', compact('vendors'));
    }

    public function deleteGeocode(Request $request, $vendorId)
    {
        // Assuming 'latitude_c' and 'longitude_c' can be set to NULL to indicate deletion
        $updated = DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                    ->where('id_c', $vendorId)
                    ->update(['latitude_c' => null, 'longitude_c' => null]);

        if ($updated) {
            return back()->with('success', 'Geocode deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete geocode.');
        }
    }



    public function geocodeVendor(Request $request, $vendorId)
    {
        $vendor = DB::connection('suitecrm')->table('vsf_vendornetwork')
                    ->where('id', $vendorId)
                    ->first();

        $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";

        if (!$vendor) {
            return back()->with('error', 'Vendor not found.');
        }

        $apiKey = 'AIzaSyC-uinPGEDW4voYvER7uMRLCxFE6z3aRUM';
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $address, // Ensure you have an address field or combine fields to create an address
            'key' => $apiKey,
        ]);

        if ($response->successful() && !empty($response->json('results'))) {
            $location = $response->json('results')[0]['geometry']['location'];
            DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
              ->where('id_c', $vendorId)
              ->update(['latitude_c' => $location['lat'], 'longitude_c' => $location['lng']]);

            return back()->with('success', 'Geocode updated successfully.');
        } else {
            return back()->with('error', 'Failed to geocode the address.');
        }
    }
}
