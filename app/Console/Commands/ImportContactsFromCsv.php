<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\Csv\Reader;

class ImportContactsFromCsv extends Command
{
    protected $signature = 'import:contacts-csv';
    protected $description = 'Imports contacts from a CSV file into SuiteCRM.';

    public function handle()
    {
        $filePath = storage_path('exports/contacts.csv'); // Adjust for your file path

        if (!file_exists($filePath)) {
            $this->error("CSV file does not exist.");
            return;
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        foreach ($records as $record) {
            $contactId = Str::uuid();

            DB::connection('suitecrm')->table('vsf_vendorcontact')->insert([
                'id' => $contactId,
                'name' => $record['Contact Name'],
                'email' => $record['Contact Email'],
                'phone' => $record['Contact Phone'],
                'contact_type' => $record['Contact Position'],
                'modified_user_id' => $record['SuiteCRM Vendor ID'], // Adjust based on your CSV structure
                'created_by' => "LaravelImport",
                'assigned_user_id' => $record['SuiteCRM Vendor ID'], // Adjust based on your CSV structure
            ]);

            // Assume you have the logic to map vsf_vendornetwork_id from SuiteCRM Vendor ID
            // This step may require additional logic if SuiteCRM Vendor ID needs to be looked up or transformed
            DB::connection('suitecrm')->table('vsf_vendornetwork_vsf_vendorcontact_1_c')->insert([
                'id' => Str::uuid(),
                'date_modified' => now(),
                'deleted' => 0,
                'vsf_vendornetwork_vsf_vendorcontact_1vsf_vendornetwork_ida' => $record['SuiteCRM Vendor ID'],
                'vsf_vendornetwork_vsf_vendorcontact_1vsf_vendorcontact_idb' => $contactId,
            ]);
        }

        $this->info('Contacts import completed.');
    }
}
