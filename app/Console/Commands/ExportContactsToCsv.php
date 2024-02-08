<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportContactsToCsv extends Command
{
    protected $signature = 'export:contacts';
    protected $description = 'Exports contacts and their corresponding vendor names to a CSV file.';

    public function handle()
    {
        $this->info('Exporting contacts to CSV...');

        $filePath = storage_path('exports/contacts.csv');
        $directory = dirname($filePath);

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $file = fopen($filePath, 'w');

        // Fetch SuiteCRM vendor IDs by vendor_name
        $suitecrmVendorIds = DB::connection('suitecrm')
            ->table('vsf_vendornetwork') // Replace with your actual SuiteCRM vendors table
            ->pluck('id', 'vendor_name'); // Assume 'suitecrm_vendor_id' and 'vendor_name' are your columns

        // Set the column headers including SuiteCRM Vendor ID
        fputcsv($file, ['ID', 'SuiteCRM Vendor ID', 'Vendor Name', 'Contact Name', 'Contact Email', 'Contact Phone', 'Contact Position', 'Contact Phone Extension', 'Created At', 'Updated At']);

        // Fetch the data
        $contacts = DB::table('contacts as c')
            ->join('vendors as v', 'c.vendor_id', '=', 'v.id')
            ->select(
                'c.id',
                'v.name as vendor_name',
                'c.contact_name',
                'c.contact_email',
                'c.contact_phone',
                'c.contact_position',
                'c.contact_phone_extension',
                'c.created_at',
                'c.updated_at'
            )
            ->get();

        // Write each row to the CSV file
        foreach ($contacts as $contact) {
            // Add SuiteCRM Vendor ID to each row if available
            $suitecrmVendorId = $suitecrmVendorIds[$contact->vendor_name] ?? 'Not Found';
            fputcsv($file, array_merge([(array) $contact, 'SuiteCRM Vendor ID' => $suitecrmVendorId]));
        }

        fclose($file);

        $this->info('Export completed: ' . $filePath);
    }

}
