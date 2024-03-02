<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GeocodeVendors extends Command
{
    protected $signature = 'geocode:vendors';
    protected $description = 'Geocode vendor addresses and update their lat/lng in the database';

    public function handle()
    {
        $vendors = DB::connection('suitecrm')->table('vsf_vendornetwork')
            ->leftJoin('vsf_vendornetwork_cstm', 'vsf_vendornetwork.id', '=', 'vsf_vendornetwork_cstm.id_c')
            ->select('vsf_vendornetwork.*', 'vsf_vendornetwork_cstm.longitude_c', 'vsf_vendornetwork_cstm.latitude_c')
            ->whereNull('vsf_vendornetwork_cstm.longitude_c') // Assuming you want to update vendors without longitude
            ->orWhereNull('vsf_vendornetwork_cstm.latitude_c') // or latitude
            ->get();

        foreach ($vendors as $vendor) {
            $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";
            $geoData = $this->geocodeAddress($address);

            if ($geoData) {
                DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                    ->updateOrInsert(
                        ['id_c' => $vendor->id], // Ensure correct association
                        [
                            'longitude_c' => $geoData['lng'],
                            'latitude_c' => $geoData['lat'],
                        ]
                    );
            }
        }
    }

    protected function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $address,
            'key' => $apiKey,
        ]);

        if ($response->successful() && !empty($response->json('results'))) {
            return [
                'lat' => $response->json('results.0.geometry.location.lat'),
                'lng' => $response->json('results.0.geometry.location.lng'),
            ];
        }

        return null;
    }
}
