<?php

namespace App\Livewire;

use Livewire\Component;

Use App\Models\Vendor;
Use App\Models\Address;
Use App\Models\AgreementForm;
Use App\Models\Capability;
Use App\Models\Equipment;
Use App\Models\Insurance;
Use App\Models\ServiceFee;
Use App\Models\W9Submission;
Use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use PDF;
use Str;
Use Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $addresses = [['address' => '', 'address2' => '', 'city' => '', 'state' => '', 'postal' => '', 'country' => '', 'address_type' => 'billing']];
    public $step = 1;


    public $vendor_name, $owner_name, $owner_phone, $vendor_type, $vendor_phone, $vendor_email, $vendor_fax, $vendor_website;

 // Step 1 - Address Information
 public $address, $address2, $city, $state, $postal, $country, $address_type, $user_id;

 // Step 2 - Insurance Information
 public $vehicle_file, $vehicle_effective_date, $vehicle_expiration_date;
 public $general_liability_file, $general_effective_date, $general_expiry_date;
 public $worker_file, $worker_effective_date, $worker_expiry_date;

 // Step 3 - Capabilities
 public $geographic_service_area_miles, $no_mileage_charge_area_miles;
 public $service_response_time_in_service_area, $service_response_time_in_no_charge_area;
 public $workmanship_warranty, $supplies_materials_warranty;
 public $standard_markup_percentage, $vehicles_fully_equipped;
 public $special_notes;

 // Step 4 - Service Fee Information
 public $concrete_per_yard, $rebar, $survey, $permit_staff_per_hour, $neon_per_unit_general;
 public $backhoe_minimum, $auger_minimum, $industrial_crane_minimum, $high_risk_staging;
 public $truck_1_technician_per_hour, $truck_2_technician_per_hour;

 // Step 5 - Equipment Information
 public $equipment_type, $make_and_model, $reach, $quantity, $notes;

 // Step 6 - W9 Submission
 public $file_path;

 // Step 7 - Agreement Information
 public $is_certified, $signature_path, $name, $title;


 public $signatureImage;

    public function mount()
    {
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.multi-step-form')->layout('components.layouts.front', ['step' => $this->step]);
    }

    public function nextStep()
    {
        $this->validateData();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function validateData()
    {
        if ($this->step == 1) {
            $this->validate([
                'vendor_name' => 'required',
                'owner_name' => 'required',
                'owner_phone' => 'required',
                'vendor_type' => 'nullable',
                'vendor_phone' => 'required',
                'vendor_email' => 'required|email|unique:vendors,vendor_email',
                'vendor_fax' => 'nullable',
                'vendor_website' => 'nullable',
            ]);
        }
        if ($this->step == 2) {
            $rules = [];
            foreach ($this->addresses as $index => $address) {
                $rules["addresses.{$index}.address"] = 'required|string|max:255';
                $rules["addresses.{$index}.address2"] = 'nullable|string|max:255';
                $rules["addresses.{$index}.city"] = 'required|string|max:255';
                $rules["addresses.{$index}.state"] = 'required|string|max:255';
                $rules["addresses.{$index}.postal"] = 'required|numeric|digits:5';
                $rules["addresses.{$index}.country"] = 'required|string|max:255';
                $rules["addresses.{$index}.address_type"] = 'sometimes|string|max:255';
            }

            $this->validate($rules);
        }



        if ($this->step == 3) {
            // Since file validation can get a bit tricky and depends on how you handle files,
            // I've provided a simple example. You might need to adjust as per your actual requirements.
            $this->validate([
                'vehicle_file' => 'nullable|file',
                'vehicle_effective_date' => 'nullable|date',
                'vehicle_expiration_date' => 'nullable|date',
                'general_liability_file' => 'nullable|file',
                'general_effective_date' => 'nullable|date',
                'general_expiry_date' => 'nullable|date',
                'worker_file' => 'nullable|file',
                'worker_effective_date' => 'nullable|date',
                'worker_expiry_date' => 'nullable|date',
            ]);
        }

        if ($this->step == 4) {
            $this->validate([
                'geographic_service_area_miles' => 'nullable|numeric',
                'no_mileage_charge_area_miles' => 'nullable|numeric',
                'service_response_time_in_service_area' => 'nullable|string',
                'service_response_time_in_no_charge_area' => 'nullable|string',
                'workmanship_warranty' => 'nullable|string',
                'supplies_materials_warranty' => 'nullable|string',
                'standard_markup_percentage' => 'nullable|numeric',
                'vehicles_fully_equipped' => 'nullable|boolean',
                'special_notes' => 'nullable|string',
            ]);
        }

        if ($this->step == 5) {
            $this->validate([
                'equipment_type' => 'nullable|string',
                'make_and_model' => 'nullable|string',
                'reach' => 'nullable|string',
                'quantity' => 'nullable|numeric',
                'notes' => 'nullable|string',
            ]);
        }

        if ($this->step == 6) {
            $this->validate([
                'concrete_per_yard' => 'nullable|numeric',
                'rebar' => 'nullable|numeric',
                'survey' => 'nullable|numeric',
                'permit_staff_per_hour' => 'nullable|numeric',
                'neon_per_unit_general' => 'nullable|numeric',
                'backhoe_minimum' => 'nullable|numeric',
                'auger_minimum' => 'nullable|numeric',
                'industrial_crane_minimum' => 'nullable|numeric',
                'high_risk_staging' => 'nullable|numeric',
                'truck_1_technician_per_hour' => 'nullable|numeric',
                'truck_2_technician_per_hour' => 'nullable|numeric',
            ]);
        }

        if ($this->step == 7) {
            $this->validate([
                'file_path' => 'nullable',  // Assuming W9 document is required
            ]);
        }

        if ($this->step == 8) {
            $this->validate([
                'is_certified' => 'required|boolean',
                'signature_path' => 'nullable|file|mimes:png,jpg,jpeg,pdf',  // You might want to ensure a file size limit here too.
                'name' => 'required|string',
                'title' => 'required|string',
            ]);
        }
    }

    public $vendorId; // Add this line to declare the property

    private function submitToSuiteCRM($vendor)
    {
         try {
        $this->vendorId = Str::uuid(); // Assign the UUID to the class property

        $vendor = new Vendor;
        $vendor->name = $this->vendor_name; // and other relevant fields
        $vendor->save();

        // Insert vendor data into SuiteCRM's vsf_vendornetwork table
        DB::connection('suitecrm')->table('vsf_vendornetwork')->insert([
            'id' => $this->vendorId,
            'vendor_name_c' => $this->vendor_name,
            'owner_name_c' => $this->owner_name,
            'owner_phone_c' => $this->owner_phone,
            'vendor_type_c' => $this->vendor_type,
            'vendor_phone_c' => $this->vendor_phone,
            'vendor_email_c' => $this->vendor_email,
            'vendor_fax_c' => $this->vendor_fax,
            'vendor_website_c' => $this->vendor_website,

            // Insurance Information
            'vehicle_effective_date_c' => $this->vehicle_effective_date,
            'vehicle_expiration_date_c' => $this->vehicle_expiration_date,
            'general_effective_date_c' => $this->general_effective_date,
            'general_expiry_date_c' => $this->general_expiry_date,
            'worker_effective_date_c' => $this->worker_effective_date,
            'worker_expiry_date_c' => $this->worker_expiry_date,

            // Capabilities
            'geographic_service_area_miles_' => $this->geographic_service_area_miles,
            'no_mileage_charge_area_miles_c' => $this->no_mileage_charge_area_miles,
            'service_response_time_in_servi' => $this->service_response_time_in_service_area,
            'service_response_time_in_no_ch' => $this->service_response_time_in_no_charge_area,
            'workmanship_warranty_c' => $this->workmanship_warranty,
            'supplies_materials_warranty_c' => $this->supplies_materials_warranty,
            'standard_markup_percentage_c' => $this->standard_markup_percentage,
            'vehicles_fully_equipped_c' => $this->vehicles_fully_equipped,
            'special_notes_c' => $this->special_notes,

            // Service Fee Information
            'concrete_per_yard_c' => $this->concrete_per_yard,
            'rebar_c' => $this->rebar,
            'survey_c' => $this->survey,
            'permit_staff_per_hour_c' => $this->permit_staff_per_hour,
            'neon_per_unit_general_c' => $this->neon_per_unit_general,
     //       'backhoe_minimum_c' => $this->backhoe_minimum,
            'auger_minimum_c' => $this->auger_minimum,
            'industrial_crane_minimum_c' => $this->industrial_crane_minimum,
            'high_risk_staging_c' => $this->high_risk_staging,
            'truck_1_technician_per_hour_c' => $this->truck_1_technician_per_hour,
            'truck_2_technician_per_hour_c' => $this->truck_2_technician_per_hour,

            // Equipment Information
            'equipment_type_c' => $this->equipment_type,
            'make_and_model_c' => $this->make_and_model,
            'reach_c' => $this->reach,
            'quantity_c' => $this->quantity,
            'notes_c' => $this->notes,

            // W9 Submission
            'file_path_c' => $this->file_path, // Assuming this will be a file path

            // Agreement Information
            'is_certified_c' => $this->is_certified,
            'signature_path_c' => $this->signature_path,
            'agreement_name_c' => $this->name,
            'agreement_title_c' => $this->title,

        ]);


        foreach ($this->addresses as $address) {
            // Insert each address into SuiteCRM's vsf_addressnew table
            $addressId = Str::uuid(); // Generating a UUID for the address record
            DB::connection('suitecrm')->table('vsf_addressnew')->insert([
                'id' => $addressId,
                'name' => $this->vendor_name . ' Address',
                'date_entered' => now(),
                'date_modified' => now(),
                'modified_user_id' => $this->vendorId,
                'created_by' => $this->vendorId,
                'description' => 'Address for ' . $this->vendor_name,
                'deleted' => 0,
                'assigned_user_id' => $this->vendorId,
                'address_cnew_city' => $address['city'],
                'address_cnew_state' => $address['state'],
                'address_cnew_postalcode' => $address['postal'],
                'address_cnew_country' => $address['country'],
                'address_cnew' => $address['address'],
                'address2_cnew' => $address['address2'],
                'address_type_cnew' => $address['address_type'],
                // Add other fields as per your table's structure
            ]);

              // Call handleFileUploads to upload files and get full paths
    $filePaths = $this->handleFileUploads($vendor);



    // Update vendor record with the file paths
    DB::connection('suitecrm')->table('vsf_vendornetwork')->where('id', $this->vendorId)->update([
        'vehicle_file_path_c' => $filePaths['vehicle'] ?? null,
        'general_liability_file_path_c' => $filePaths['general_liability'] ?? null,
        'worker_file_path_c' => $filePaths['worker'] ?? null,
        'file_path_c' => $filePaths['w9'] ?? null,
        // ... other fields if needed ...
    ]);

            // Insert a record in the relationship table
            DB::connection('suitecrm')->table('vsf_vendornetwork_vsf_addressnew_c')->insert([
                'id' => Str::uuid(),
                'date_modified' => now(),
                'deleted' => 0,
                'vsf_vendornetwork_vsf_addressnewvsf_vendornetwork_ida' => $this->vendorId,
                'vsf_vendornetwork_vsf_addressnewvsf_addressnew_idb' => $addressId,
            ]);
        }
        } catch (\Exception $e) {
            // Handle exception
            Log::error('Error in submitToSuiteCRM: ' . $e->getMessage());
            // You may want to return or handle this error appropriately
        }
    }

        // ... Any other SuiteCRM related operations ...


    private function submitToLaravelDB()
    {
        $user = User::create([
            'name' => $this->vendor_name,
            'email' => $this->vendor_email,
            'password' => bcrypt($this->vendor_phone),
        ]);

        $vendor = Vendor::create([
            'vendor_name' => $this->vendor_name,
            'owner_name' => $this->owner_name,
            'owner_phone' => $this->owner_phone,
            'vendor_type' => $this->vendor_type,
            'vendor_phone' => $this->vendor_phone,
            'vendor_email' => $this->vendor_email,
            'vendor_fax' => $this->vendor_fax,
            'vendor_website' => $this->vendor_website,
            'user_id' => $user->id,
        ]);


        foreach ($this->addresses as $address) {
            $vendor->address()->create([
                'address' => $address['address'],
                'address2' => $address['address2'],
                'city' => $address['city'],
                'state' => $address['state'],
                'postal' => $address['postal'],
                'country' => $address['country'],
                'address_type' => $address['address_type'],
            ]);
        }

                    $this->handleFileUploads($vendor);

                    if ($this->is_certified) {
                        $this->generateAndStorePdf($vendor);
                    }

                    // Other related creations like Capability, Equipment, Service Fee, W9Submission...
        // Create Insurance for Vendor
        $vendor->insurance()->create([
            'vehicle_effective_date' => $this->vehicle_effective_date,
            'vehicle_expiration_date' => $this->vehicle_expiration_date,
            'general_effective_date' => $this->general_effective_date,
            'general_expiry_date' => $this->general_expiry_date,
            'worker_effective_date' => $this->worker_effective_date,
            'worker_expiry_date' => $this->worker_expiry_date,
        ]);

        // Create Capabilities for Vendor
        $vendor->capability()->create([
            'geographic_service_area_miles' => $this->geographic_service_area_miles,
            'no_mileage_charge_area_miles' => $this->no_mileage_charge_area_miles,
            'service_response_time_in_service_area' => $this->service_response_time_in_service_area,
            'service_response_time_in_no_charge_area' => $this->service_response_time_in_no_charge_area,
            'workmanship_warranty' => $this->workmanship_warranty,
            'supplies_materials_warranty' => $this->supplies_materials_warranty,
            'standard_markup_percentage' => $this->standard_markup_percentage,
            'vehicles_fully_equipped' => $this->vehicles_fully_equipped,
            'special_notes' => $this->special_notes,
        ]);

        // Create Equipment for Vendor
        $vendor->equipment()->create([
            'equipment_type' => $this->equipment_type,
            'make_and_model' => $this->make_and_model,
            'reach' => $this->reach,
            'quantity' => $this->quantity,
            'notes' => $this->notes,
        ]);

        // Create Service Fee for Vendor
        $vendor->serviceFee()->create([
            'concrete_per_yard' => $this->concrete_per_yard,
            'rebar' => $this->rebar,
            'survey' => $this->survey,
            'permit_staff_per_hour' => $this->permit_staff_per_hour,
            'neon_per_unit_general' => $this->neon_per_unit_general,
            'backhoe_minimum' => $this->backhoe_minimum,
            'auger_minimum' => $this->auger_minimum,
            'industrial_crane_minimum' => $this->industrial_crane_minimum,
            'high_risk_staging' => $this->high_risk_staging,
            'truck_1_technician_per_hour' => $this->truck_1_technician_per_hour,
            'truck_2_technician_per_hour' => $this->truck_2_technician_per_hour,
        ]);

        $vendor->AgreementForm()->create([

            'name' => $this->name,
            'title' => $this->title, // You need to provide a value for the name field
            'created_at' => now(),
            'updated_at' => now(),
            // other fields...
        ]);

    }


    public function submitForm()
{
    DB::transaction(function () {
        $this->submitToSuiteCRM();
        $this->submitToLaravelDB();
        // ... Any additional code to be executed after both operations ...
    });

    $this->resetForm();
}
/**
 * Generate a unique file name for an uploaded file.
 *
 * @param string $vendorName The name of the vendor.
 * @param string $fileType The type of file (e.g., 'vehicle_file', 'general_liability_file').
 * @param string $extension The file extension.
 * @return string The generated file name.
 */
private function generateFileName($vendorName, $fileType, $extension)
{
    // Clean the vendor name to be used in a file name
    $cleanVendorName = Str::slug($vendorName);

    // Generate a random string for uniqueness
    $randomString = Str::random(8);

    // Construct the file name
    $fileName = "{$cleanVendorName}_{$fileType}_{$randomString}.{$extension}";

    return $fileName;
}

private function handleFileUploads($vendor)
{
    $filePaths = [];


    if ($this->vehicle_file) {
        $vehicleFileName = $this->generateFileName($this->vendor_name, 'vehicle_file', $this->vehicle_file->extension());
        $vehicleFilePath = $this->vehicle_file->storeAs('vehicle', $vehicleFileName, 'linode');
        $vehicleFilePathFull = 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$vehicleFilePath;
        $vendor->insurance()->updateOrCreate(['vehicle_file' => $vehicleFilePathFull]);
        $filePaths['vehicle'] = $vehicleFilePathFull;
    }

    if ($this->general_liability_file) {
        $generalFileName = $this->generateFileName($this->vendor_name, 'general_liability_file', $this->general_liability_file->extension());
        $generalFilePath = $this->general_liability_file->storeAs('general', $generalFileName, 'linode');
        $generalFilePathFull = 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$generalFilePath;
        $vendor->insurance()->updateOrCreate(['general_liability_file' => $generalFilePathFull]);
        $filePaths['general_liability'] = $generalFilePathFull;
    }

    if ($this->worker_file) {
        $workerFileName = $this->generateFileName($this->vendor_name, 'worker_file', $this->worker_file->extension());
        $workerFilePath = $this->worker_file->storeAs('worker', $workerFileName, 'linode');
        $workerFilePathFull = 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$workerFilePath;
        $vendor->insurance()->updateOrCreate(['worker_file' => $workerFilePathFull]);
        $filePaths['worker'] = $workerFilePathFull;
    }

    if ($this->file_path) {
        $w9FileName = $this->generateFileName($this->vendor_name, 'w9', $this->file_path->extension());
        $w9FilePath = $this->file_path->storeAs('w9submission', $w9FileName, 'linode');
        $w9FilePathFull = 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$w9FilePath;
        $vendor->w9submission()->updateOrCreate(['file_path' => $w9FilePathFull]);
        $filePaths['w9'] = $w9FilePathFull;
    }



   return  $filePaths;

}


    public function generateAndStorePdf($vendor)
    {
        $data = [
            'vendor_name' => $this->vendor_name,
            'owner_name' => $this->owner_name,
            'name' => $this->name,
            'title' => $this->title,
            'is_certified' => $this->is_certified,

             // Used as a signature
            // ... other relevant data ...
        ];

        $pdf = PDF::loadView('pdf.vendor_agreement', $data);
        $pdfFileName = 'agreement_' . $this->vendor_name . '_' . date('mdY') . '.pdf';
        $pdfFilePath = 'agreements/' . $pdfFileName;
        Storage::disk('linode')->put($pdfFilePath, $pdf->output(), 'public');
        $downloadUrl = 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/' . $pdfFilePath;
        $vendor->AgreementForm()->updateOrCreate(
            [
                // Assuming 'name' is a unique identifier for AgreementForm.
                // Replace with the actual attribute if it's different.
                'name' => $this->name, // or some other unique identifier
                'title' => $this->title,
                'is_certified' => $this->is_certified,
            ],
            [
                'signature_path' => $downloadUrl,
                // Include other fields if necessary
            ]
        );



// Update the SuiteCRM record with the PDF signature path
DB::connection('suitecrm')->table('vsf_vendornetwork')->where('id', $this->vendorId)->update([
    'signature_path_c' => $downloadUrl,
]);


        // You may want to save this URL to your database or take further action here
}




    public function resetForm()
    {
        $this->reset();
    }

    public function addAddress()
    {
        $this->addresses[] = ['address' => '', 'address2' => '', 'city' => '', 'state' => '', 'postal' => '', 'country' => '', 'address_type' => ''];
    }

    public function removeAddress($index)
    {
        unset($this->addresses[$index]);
        $this->addresses = array_values($this->addresses);
    }

    }
