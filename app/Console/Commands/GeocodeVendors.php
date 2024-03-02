<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GeocodeVendors extends Command
{
    protected $signature = 'geocode:vendors';
    protected $description = 'Geocode vendor addresses and update or insert their lat/lng in the database';

    public function handle()
    {
        \Log::info("GeocodeVendors command started.");
        $vendors = DB::connection('suitecrm')->table('vsf_vendornetwork')
            ->leftJoin('vsf_vendornetwork_cstm', 'vsf_vendornetwork.id', '=', 'vsf_vendornetwork_cstm.id_c')
            ->select('vsf_vendornetwork.id', 'vsf_vendornetwork.address_c', 'vsf_vendornetwork.city_c', 'vsf_vendornetwork.state_c', 'vsf_vendornetwork.postal_c', 'vsf_vendornetwork_cstm.latitude_c', 'vsf_vendornetwork_cstm.longitude_c')
            ->get();


        $geocodedCount = 0; // To keep track of how many addresses were geocoded

        foreach ($vendors as $vendor) {
            if (is_null($vendor->latitude_c) || is_null($vendor->longitude_c)) {
                $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";
                $geoData = $this->geocodeAddress($address);

                if ($geoData) {
                    \Log::info("Updating geocode for vendor: {$vendor->id}", ['geoData' => $geoData]);
                    $updateResult = DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                        ->updateOrInsert(
                            ['id_c' => $vendor->id],
                            [
                                'longitude_c' => $geoData['lng'],
                                'latitude_c' => $geoData['lat'],
                            ]
                        );
                    if ($updateResult) {
                        $geocodedCount++;
                    } else {
                        \Log::error("Failed to update/insert geocode for vendor: {$vendor->id}");
                    }
                }
            }
        }

        // Output success message with the count of geocoded addresses
        $this->info("Geocoding complete. Total addresses geocoded: {$geocodedCount}.");
    }


    protected function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => urlencode($address),
            'key' => $apiKey,
        ]);

        if (!$response->successful() || empty($response->json('results'))) {
            \Log::error("Geocoding failed for address: $address", ['response' => $response->body()]);
            return null;
        }

        return [
            'lat' => $response->json('results.0.geometry.location.lat'),
            'lng' => $response->json('results.0.geometry.location.lng'),
        ];
    }

}
