<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Http;

class UpdateVendorLocations extends Command
{
    protected $signature = 'update:vendor-locations';
    protected $description = 'Update vendor locations with latitude and longitude';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $vendors = DB::connection('suitecrm')
            ->table('vsf_vendornetwork')
            ->whereNull('longitude_c') // Assuming you want to update records without longitude and latitude
            ->orWhereNull('latitude_c')
            ->get();

        foreach ($vendors as $vendor) {
            $address = "{$vendor->address_c}, {$vendor->city_c}, {$vendor->state_c} {$vendor->postal_c}";
            $geocode = $this->geocodeAddress($address);
            if ($geocode) {
                DB::connection('suitecrm')
                    ->table('vsf_vendornetwork')
                    ->where('id', $vendor->id)
                    ->update([
                        'longitude_c' => $geocode['lng'],
                        'latitude_c' => $geocode['lat'],
                    ]);
            }
        }
    }

    protected function geocodeAddress($address)
    {
        $apiKey = env('AIzaSyD18r4JGshadpsZLRzn3UfeH2WsMUEJ0Fc'); // Store your API key in .env file
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $address,
            'key' => $apiKey,
        ]);

        if ($response->successful()) {
            $json = $response->json();
            if (!empty($json['results'])) {
                return [
                    'lat' => $json['results'][0]['geometry']['location']['lat'],
                    'lng' => $json['results'][0]['geometry']['location']['lng'],
                ];
            }
        }

        return null;
    }
}
