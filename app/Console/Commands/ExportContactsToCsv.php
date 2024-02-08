<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportContactsToCsv extends Command
{
    protected $signature = 'export:contacts';
    protected $description = 'Exports contacts and their corresponding vendor names to a CSV file, including SuiteCRM vendor ID.';

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

        // Fetch SuiteCRM vendor IDs indexed by vendor_name from the SuiteCRM database connection
        $suitecrmVendorIds = DB::connection('suitecrm')
            ->table('vsf_vendornetwork') // Adjust with your actual SuiteCRM vendor table
            ->pluck('id', 'name'); // Ensure 'id' and 'name' match the actual columns in SuiteCRM

        // Set the column headers for the CSV file
        fputcsv($file, ['ID', 'SuiteCRM Vendor ID', 'Vendor Name', 'Contact Name', 'Contact Email', 'Contact Phone', 'Contact Position', 'Contact Phone Extension', 'Created At', 'Updated At']);

        // Fetch the contact data from your SQLite database
        $contacts = DB::table('contacts as c')
            ->join('vendors as v', 'c.vendor_id', '=', 'v.id')
            ->select(
                'c.id',
                'v.name as vendor_name', // Ensure this matches the column in your vendors table
                'c.contact_name',
                'c.contact_email',
                'c.contact_phone',
                'c.contact_position',
                'c.contact_phone_extension',
                'c.created_at',
                'c.updated_at'
            )
            ->get();

        // Write each contact row to the CSV file, including the SuiteCRM Vendor ID
        foreach ($contacts as $contact) {
            $contactArray = (array)$contact; // Ensure $contact is properly cast to an array
            // Use vendor_name to fetch the corresponding SuiteCRM Vendor ID
            $contactArray['SuiteCRM Vendor ID'] = $suitecrmVendorIds[$contact->vendor_name] ?? 'Not Found';

            // Prepare the row data ensuring correct order and inclusion of all desired fields
            $rowData = [
                $contactArray['id'],
                $contactArray['SuiteCRM Vendor ID'], // Include the SuiteCRM Vendor ID in the CSV row
                $contactArray['vendor_name'],
                $contactArray['contact_name'],
                $contactArray['contact_email'],
                $contactArray['contact_phone'],
                $contactArray['contact_position'],
                $contactArray['contact_phone_extension'],
                $contactArray['created_at'],
                $contactArray['updated_at']
            ];

            fputcsv($file, $rowData); // Write the row to the CSV file
        }

        fclose($file); // Close the file after writing all contacts

        $this->info('Export completed: ' . $filePath);
    }
}
