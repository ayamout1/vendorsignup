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

class MultiStepForm extends Component
{

    use WithFileUploads;

    public $addresses = [
        ['address' => '', 'address2' => '', 'city' => '', 'state' => '', 'postal' => '', 'country' => '', 'address_type' => 'billing'],
        // Additional addresses as needed...
    ];
public  $step =1;

    // Variables for form data (assuming Vendor model has these fields)
// vendor information
    public $vendor_name;
public $owner_name;
public $owner_phone;
public $vendor_type;
public $vendor_phone;
public $vendor_email;
public $vendor_fax;
public $vendor_website;
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


public function resetStepData()
{
    // Reset step-specific data if needed
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


    public function submitForm()
    {
        DB::transaction(function () {
$user = User::create([
    'name' => $this->vendor_name,
    'email' => $this->vendor_email,
    'password' => bcrypt($this->vendor_phone),

]);
        // Validation and form submission logic
        // Create Vendor
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

// Create Address for Vendor
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

        // Handle Insurance File Upload
        if ($this->vehicle_file) {
            $vehicleFilePath = $this->vehicle_file->store('insurance', 'linode');
            // Save $FilePath to your database
        }
        if ($this->general_liability_file) {
            $generalFilePath = $this->general_liability_file->store('insurance', 'linode');
            // Save $FilePath to your database
        }
        if ($this->worker_file) {
            $workerFilePath = $this->worker_file->store('insurance', 'linode');
            // Save $FilePath to your database
        }


// Create Insurance for Vendor
$vendor->insurance()->create([
    'vehicle_file' => $vehicleFilePath ?? null,
    'vehicle_effective_date' => $this->vehicle_effective_date,
    'vehicle_expiration_date' => $this->vehicle_expiration_date,
    'general_liability_file' => $generalFilePath  ?? null,
    'general_effective_date' => $this->general_effective_date,
    'general_expiry_date' => $this->general_expiry_date,
    'worker_file' => $workerFilePath ?? null,
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

if ($this->file_path) {
    $w9FilePath = $this->file_path->store('w9submission', 'linode');
    // Save $FilePath to your database
}
// Create W9Submission for Vendor
$vendor->w9submission()->create([
    'file_path' => $w9FilePath ?? null,
]);

if ($this->file_path) {
    $w9FilePath = $this->file_path->store('w9submission', 'linode');
    // Save $FilePath to your database
}
// Create Agreement for Vendor


if ($this->signatureImage) {
    // Decode the image
    $image = explode(',', $this->signatureImage)[1];
    $image = base64_decode($image);
    $imageName = 'signatures/' . uniqid() . '.png';

    // Store the image in Linode Object Storage
    Storage::disk('linode')->put($imageName, $image);

    // Save the image path to the database
    $vendor->agreementForm()->create([
        'signature_path' => $imageName,
        'is_certified' => $this->is_certified,
        'name' => $this->name,
        'title' => $this->title,
        // ... other agreement form fields ...
    ]);
}


        // Here, perform the necessary actions for form submission.
        });
        // Reset or redirect after submission
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['step', 'vendor_name', 'address']);
    }
    public function addAddress()
    {
        $this->addresses[] = [
            'address' => '',
            'address2' => '',
            'city' => '',
            'state' => '',
            'postal' => '',
            'country' => '',
            'address_type' => '',
        ];
        \Log::info("Addresses after adding: ", $this->addresses);
    }

    public function removeAddress($index)
    {
        unset($this->addresses[$index]);
        $this->addresses = array_values($this->addresses); // Re-index array keys
    }


}
