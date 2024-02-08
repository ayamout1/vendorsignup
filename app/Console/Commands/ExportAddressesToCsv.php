<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportAddressesToCsv extends Command
{
    protected $signature = 'export:addresses';
    protected $description = 'Exports addresses and their corresponding vendor names to a CSV file, including SuiteCRM vendor ID.';

    public function handle()
    {
        $this->info('Exporting addresses to CSV...');

        $filePath = storage_path('exports/addresses.csv');
        $directory = dirname($filePath);

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $file = fopen($filePath, 'w');

        // Fetch SuiteCRM vendor IDs indexed by vendor_name from the SuiteCRM database connection
        $suitecrmVendorIds = DB::connection('suitecrm')
            ->table('vsf_vendornetwork') // Adjust with your actual SuiteCRM vendor table
            ->pluck('id', 'name'); // Ensure 'id' and 'name' match the actual columns in SuiteCRM

        // Set the column headers for the CSV file
        fputcsv($file, ['ID', 'SuiteCRM Vendor ID', 'Vendor Name', 'Address', 'Address2', 'City', 'State', 'Postal', 'Country', 'Address Type', 'Created At', 'Updated At']);

        // Fetch the address data from your SQLite database
        $addresses = DB::table('addresses as a')
            ->join('vendors as v', 'a.vendor_id', '=', 'v.id')
            ->select(
                'a.id',
                'v.vendor_name as vendor_name', // Ensure this matches the column in your vendors table
                'a.address',
                'a.address2',
                'a.city',
                'a.state',
                'a.postal',
                'a.country',
                'a.address_type',
                'a.created_at',
                'a.updated_at'
            )
            ->get();

        // Write each address row to the CSV file, including the SuiteCRM Vendor ID
        foreach ($addresses as $address) {
            $addressArray = (array)$address; // Ensure $address is properly cast to an array
            // Use vendor_name to fetch the corresponding SuiteCRM Vendor ID
            $addressArray['SuiteCRM Vendor ID'] = $suitecrmVendorIds[$address->vendor_name] ?? 'Not Found';

            // Prepare the row data ensuring correct order and inclusion of all desired fields
            $rowData = [
                $addressArray['id'],
                $addressArray['SuiteCRM Vendor ID'], // Include the SuiteCRM Vendor ID in the CSV row
                $addressArray['vendor_name'],
                $addressArray['address'],
                $addressArray['address2'],
                $addressArray['city'],
                $addressArray['state'],
                $addressArray['postal'],
                $addressArray['country'],
                $addressArray['address_type'],
                $addressArray['created_at'],
                $addressArray['updated_at']
            ];

            fputcsv($file, $rowData); // Write the row to the CSV file
        }

        fclose($file); // Close the file after writing all addresses

        $this->info('Export completed: ' . $filePath);
    }
}
