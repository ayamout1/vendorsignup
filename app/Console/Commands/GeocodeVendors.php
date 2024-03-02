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
                    DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                        ->updateOrInsert(
                            ['id_c' => $vendor->id],
                            [
                                'longitude_c' => $geoData['lng'],
                                'latitude_c' => $geoData['lat'],
                            ]
                        );
                    $geocodedCount++; // Increment the count for each successful geocode
                }
            }
        }

        // Output success message with the count of geocoded addresses
        $this->info("Geocoding complete. Total addresses geocoded: {$geocodedCount}.");
    }


    protected function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY'); // Make sure you've defined this in your .env file
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
