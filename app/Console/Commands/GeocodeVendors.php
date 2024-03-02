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
        $this->info('Starting GeocodeVendors command...');

        // Fetch vendors that either don't have a corresponding 'vsf_vendornetwork_cstm' entry or missing geocode data
        $vendors = DB::connection('suitecrm')
                     ->table('vsf_vendornetwork AS vn')
                     ->leftJoin('vsf_vendornetwork_cstm AS vnc', 'vn.id', '=', 'vnc.id_c')
                     ->select('vn.id', 'vn.address_c', 'vn.city_c', 'vn.state_c', 'vn.postal_c', 'vnc.latitude_c', 'vnc.longitude_c')
                     ->whereNull('vnc.latitude_c')
                     ->orWhereNull('vnc.longitude_c')
                     ->get();

        if ($vendors->isEmpty()) {
            $this->info('No vendors require geocoding at this time.');
            return;
        }

        $geocodedCount = 0;
        foreach ($vendors as $vendor) {
            $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";
            $geoData = $this->geocodeAddress($address);

            if (!is_null($geoData)) {
                $result = DB::connection('suitecrm')->table('vsf_vendornetwork_cstm')
                            ->updateOrInsert(
                                ['id_c' => $vendor->id],
                                ['latitude_c' => $geoData['lat'], 'longitude_c' => $geoData['lng']]
                            );

                if ($result) {
                    $geocodedCount++;
                    $this->info("Geocoded vendor ID: {$vendor->id}");
                } else {
                    $this->error("Failed to update/insert geocode for vendor ID: {$vendor->id}");
                }
            }
        }

        $this->info("Geocoding complete. Total addresses geocoded: {$geocodedCount}.");
    }

    protected function geocodeAddress($address)
    {
        $apiKey = 'AIzaSyC-uinPGEDW4voYvER7uMRLCxFE6z3aRUM';
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

        $this->error("Geocoding failed for address: $address");
        return null;
    }
}
