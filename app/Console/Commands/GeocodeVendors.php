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
        $this->info("Starting the GeocodeVendors command.");

        $vendors = DB::connection('suitecrm')->table('vsf_vendornetwork')
            ->select('id', 'address_c', 'city_c', 'state_c', 'postal_c')
            ->get();

        if ($vendors->isEmpty()) {
            $this->error("No vendors found to process.");
            return;
        }

        $geocodedCount = 0;

        foreach ($vendors as $vendor) {
            $existingCoords = DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                ->where('id_c', $vendor->id)
                ->select('latitude_c', 'longitude_c')
                ->first();

            // Skip if already geocoded
            if ($existingCoords && $existingCoords->latitude_c && $existingCoords->longitude_c) {
                continue;
            }

            $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";
            $geoData = $this->geocodeAddress($address);

            if ($geoData) {
                DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                    ->updateOrInsert(
                        ['id_c' => $vendor->id],
                        ['longitude_c' => $geoData['lng'], 'latitude_c' => $geoData['lat']]
                    );
                $geocodedCount++;
                $this->info("Successfully updated geocode for vendor ID: {$vendor->id}");
            } else {
                $this->error("Failed to geocode address for vendor ID: {$vendor->id}");
            }
        }

        $this->info("Geocoding complete. Total addresses geocoded: {$geocodedCount}.");
    }

    protected function geocodeAddress($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => urlencode($address),
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
