<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\Csv\Reader;

class ImportAddressesFromCsv extends Command
{
    protected $signature = 'import:addresses-csv';
    protected $description = 'Imports addresses from a CSV file into SuiteCRM.';

    public function handle()
    {
        $filePath = storage_path('exports/addresses.csv'); // Adjust for your file path

        if (!file_exists($filePath)) {
            $this->error("CSV file does not exist.");
            return;
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();

        foreach ($records as $record) {
            $addressId = Str::uuid();

            DB::connection('suitecrm')->table('vsf_addressnew')->insert([
                'id' => $addressId,
                'name' => $record['Vendor Name'] . ' Address',
                'created_by' => "LaravelImport",
                'description' => 'Address for ' . $record['Vendor Name'],
                'deleted' => 0,
                'address_cnew_city' => $record['City'],
                'address_cnew_state' => $record['State'],
                'address_cnew_postalcode' => $record['Postal'],
                'address_cnew_country' => $record['Country'],
                'address_cnew' => $record['Address'],
                'address2_cnew' => $record['Address2'],
                'address_type_cnew' => $record['Address Type'],
            ]);

            DB::connection('suitecrm')->table('vsf_vendornetwork_vsf_addressnew_1_c')->insert([
                'id' => Str::uuid(),
                'date_modified' => now(),
                'deleted' => 0,
                'vsf_vendornetwork_vsf_addressnew_1vsf_vendornetwork_ida' => $record['SuiteCRM Vendor ID'],
                'vsf_vendornetwork_vsf_addressnew_1vsf_addressnew_idb' => $addressId,
            ]);
        }

        $this->info('Addresses import completed.');
    }
}
