<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Str;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $addresses = [['address' => '', 'address2' => '', 'city' => '', 'state' => '', 'postal' => '', 'country' => '', 'address_type' => 'billing']];
    public $step = 1;

    // Vendor information fields
    public $vendor_name, $owner_name, $owner_phone, $vendor_type, $vendor_phone, $vendor_email, $vendor_fax, $vendor_website;

    // Insurance Information fields
    public $vehicle_file, $vehicle_effective_date, $vehicle_expiration_date;
    public $general_liability_file, $general_effective_date, $general_expiry_date;
    public $worker_file, $worker_effective_date, $worker_expiry_date;

    // Other steps fields...

    public $is_certified, $signature_path, $name, $title;  // Agreement Information fields

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
    public function submitForm()
    {
        DB::transaction(function () {
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

            $this->resetForm();
        });
    }

    private function handleFileUploads($vendor)
    {
        if ($this->vehicle_file) {
            $vehicleFileName = $this->generateFileName($this->vendor_name, 'vehicle_file', $this->vehicle_file->extension());
            $vehicleFilePath = $this->vehicle_file->storeAs('insurance', $vehicleFileName, 'linode');
            $vendor->insurance()->updateOrCreate([], ['vehicle_file' => $vehicleFilePath]);
        }

        if ($this->general_liability_file) {
            $generalFileName = $this->generateFileName($this->vendor_name, 'general_liability_file', $this->general_liability_file->extension());
            $generalFilePath = $this->general_liability_file->storeAs('insurance', $generalFileName, 'linode');
            $vendor->insurance()->updateOrCreate([], ['general_liability_file' => $generalFilePath]);
        }

        if ($this->worker_file) {
            $workerFileName = $this->generateFileName($this->vendor_name, 'worker_file', $this->worker_file->extension());
            $workerFilePath = $this->worker_file->storeAs('insurance', $workerFileName, 'linode');
            $vendor->insurance()->updateOrCreate([], ['worker_file' => $workerFilePath]);
        }
        if ($this->file_path) {
            $w9FileName = $this->generateFileName($this->vendor_name, 'w9', $this->file_path->extension());
            $w9FilePath = $this->file_path->storeAs('w9submission', $w9FileName, 'linode');
            $vendor->w9submission()->updateOrCreate([], ['file_path' => $w9FilePath]);
        }
    }

    private function generateAndStorePdf($vendor)
    {
        $data = [
            'vendor_name' => $this->vendor_name,
            'owner_name' => $this->owner_name, // Used as a signature
            // ... other relevant data ...
        ];

        $pdf = PDF::loadView('pdf.confidentiality_agreement', $data);
        $pdfFileName = 'agreement_' . $this->vendor_name . '_' . time() . '.pdf';
        $pdfFilePath = 'agreements/' . $pdfFileName;
        Storage::disk('linode')->put($pdfFilePath, $pdf->output(), 'public');
        $downloadUrl = Storage::disk('linode')->url($pdfFilePath);

        // You may want to save this URL to your database or take further action here

        return response()->json(['download_url' => $downloadUrl]);
    }


    public function resetForm()
    {
        $this->reset(['step', 'vendor_name', 'address', /* other fields... */]);
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
