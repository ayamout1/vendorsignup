<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncDataToSuiteCRM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-data-to-suite-c-r-m';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Set the database connection to SQLite
        $vendors = Vendor::on('sqlite')->whereDoesntHave('suitecrmSync')->get(); // Example, adjust based on actual logic

        foreach ($vendors as $vendor) {
            // Fetch or map vendor ID from MySQL based on unique vendor name
            $vendorIdInMySQL = $this->getVendorIdByName($vendor->vendor_name);

            if (!$vendorIdInMySQL) {
                // Insert vendor into MySQL if not exists, and get the ID
                $vendorIdInMySQL = $this->insertVendorToMySQL($vendor);
            }

            // Insert related data (contacts, addresses, etc.) into MySQL
            $this->insertRelatedDataToMySQL($vendor, $vendorIdInMySQL);

            // Optionally, mark vendor as synced in SQLite database
            $vendor->suitecrmSync()->create(['synced' => true]); // You need to set up this relationship or a similar mechanism
        }
    }

    private function getVendorIdByName($vendorName)
    {
        // Implement logic to fetch vendor ID from MySQL database based on vendor name
        // Use DB facade or Eloquent model with MySQL connection
    }

    private function insertVendorToMySQL($vendor)
    {
        // Implement logic to insert vendor into MySQL and return new ID
        // Use DB facade or Eloquent model with MySQL connection
    }

    private function insertRelatedDataToMySQL($vendor, $vendorIdInMySQL)
    {
        // Implement logic to insert related data (contacts, addresses, etc.) into MySQL
        // Use DB facade or Eloquent model with MySQL connection
        // Make sure to handle pivot tables as well
    }
}
