<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportAddressesToCsv extends Command
{
    protected $signature = 'export:addresses';
    protected $description = 'Exports addresses and their corresponding vendor names to a CSV file.';

    public function handle()
    {
        $this->info('Exporting addresses to CSV...');

        $filePath = storage_path('exports/addresses.csv'); // Define your export path here
        $file = fopen($filePath, 'w'); // Open the file for writing

        // Set the column headers
        fputcsv($file, ['ID', 'Vendor Name', 'Address', 'Address2', 'City', 'State', 'Postal', 'Country', 'Address Type', 'Deleted At', 'Created At', 'Updated At']);

        // Fetch the data
        $addresses = DB::table('addresses as a')
            ->join('vendors as v', 'a.vendor_id', '=', 'v.id')
            ->select('a.id', 'v.vendor_name as vendor_name', 'a.address', 'a.address2', 'a.city', 'a.state', 'a.postal', 'a.country', 'a.address_type', 'a.deleted_at', 'a.created_at', 'a.updated_at')
            ->get();

        // Write each row to the CSV file
        foreach ($addresses as $address) {
            fputcsv($file, (array) $address);
        }

        fclose($file); // Close the file

        $this->info('Export completed: ' . $filePath);
    }
}
