<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;
use App\Models\Vendor;
use App\Models\Insurance;
use App\Models\W9Submission;

class FileUploadController extends Controller
{
    public function show($email)
    {
        //get vendor to update his files

       // $vendor = Vendor::all()->where('vendor_email',$email)->firstOrFail();
       $vendorFiles = DB::connection('suitecrm')->table('vsf_vendornetwork')
       ->where('vendor_email_c', $email) // Adjust the column name if necessary
       ->first([
            'vendor_email_c',
           'vehicle_file_path_c',
           'general_liability_file_path_c',
           'worker_file_path_c',
           'file_path_c' // Assuming this is for the W9 file
       ]);

// Check if records are found and return them
     //   dd($w9file);
        // Logic to show existing file or upload form
        return view('file.show', compact('vendorFiles'));;
    }

    public function update(Request $request, $vendorFiles)
    {



        dd($request);
        try {
            // Retrieve the vendor based on email
            $vendor = DB::connection('suitecrm')
                        ->table('vsf_vendornetwork')
                        ->where('vendor_email_c', $request['email']) // Assume 'vendor_email_c' is the email column
                        ->first();


            if(!$vendor){
                // Vendor not found
                return response()->json(['error' => 'Vendor not found'], 404);
            }

//dd($request);

            // Assuming you're updating the 'vendor_file' field
            if($request->hasFile('vehicle_file')){
                $file = $request->file('vehicle_file');

                //delete old file
                Storage::disk('linode')->delete($file);

                // Handle file upload, save to storage, etc.
                $fileName = $this->generateFileName($vendor->vendor_name_c, 'vehicle', $file->getClientOriginalExtension());

                $filePath = $file->storeAs('vehicle', $fileName, 'linode'); // Example path, replace with actual

                // Update the vendor record with new file path
                DB::connection('suitecrm')
                    ->table('vsf_vendornetwork')
                    ->where('vendor_email_c', $request['vendor_email'])
                    ->update(['vehicle_file_path_c' => 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$filePath]);
            }
            if($request->hasFile('general_liability_file')){
                $file = $request->file('general_liability_file');

                //delete old file
                Storage::disk('linode')->delete($file);

                // Handle file upload, save to storage, etc.
                $fileName = $this->generateFileName($vendor->vendor_name_c, 'general_liability_file', $file->getClientOriginalExtension());

                $filePath = $file->storeAs('general_liability_file', $fileName, 'linode'); // Example path, replace with actual

                // Update the vendor record with new file path
                DB::connection('suitecrm')
                    ->table('vsf_vendornetwork')
                    ->where('vendor_email_c', $request['vendor_email'])
                    ->update(['general_liability_file_c' => 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$filePath]);
            }
            if($request->hasFile('worker_file')){
                $file = $request->file('worker_file');

                //delete old file
                Storage::disk('linode')->delete($file);

                // Handle file upload, save to storage, etc.
                $fileName = $this->generateFileName($vendor->vendor_name_c, 'worker_file', $file->getClientOriginalExtension());

                $filePath = $file->storeAs('worker_file', $fileName, 'linode'); // Example path, replace with actual

                // Update the vendor record with new file path
                DB::connection('suitecrm')
                    ->table('vsf_vendornetwork')
                    ->where('vendor_email_c', $request['vendor_email'])
                    ->update(['worker_file_path_c' => 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$filePath]);
            }
            if($request->hasFile('file_path')){
                $file = $request->file('file_path');

                //delete old file
                Storage::disk('linode')->delete($file);

                // Handle file upload, save to storage, etc.
                $fileName = $this->generateFileName($vendor->vendor_name_c, 'w9submission', $file->getClientOriginalExtension());

                $filePath = $file->storeAs('w9submission', $fileName, 'linode'); // Example path, replace with actual

                // Update the vendor record with new file path
                DB::connection('suitecrm')
                    ->table('vsf_vendornetwork')
                    ->where('vendor_email_c', $request['vendor_email'])
                    ->update(['file_path_c' => 'https://vendorsubmissions.us-southeast-1.linodeobjects.com/'.$filePath]);
            }

            // Return success response
            return response()->json(['message' => 'File updated successfully']);

        } catch (\Exception $e) {
            // Handle exception
            return response()->json(['error' => $e->getMessage()], 500);
        }







        // Handle file updates
        $filePaths = $this->handleFileUpdates($vendor, $data);

        // Update the vendor record with new file paths and other info
        $vendor->update([
            'vehicle_file_path' => $filePaths['vehicle_file'] ?? $vendor->vehicle_file_path,
            'general_liability_file_path' => $filePaths['general_liability_file'] ?? $vendor->general_liability_file_path,
            'worker_file_path' => $filePaths['worker_file'] ?? $vendor->worker_file_path,
            'w9_file_path' => $filePaths['file_path'] ?? $vendor->w9_file_path,
            // ... other fields that might be updated
        ]);

        // Redirect back or to another page with success message
        return redirect()->route('some.route')->with('success', 'Vendor information updated successfully!');
    }
    private function handleFileUpdates($vendor,$data)
{


    $filePaths = [];

    // Example of handling vehicle file update
    if ($data['vehicle_file']) {
        // Assume $vendor->vehicle_file_path contains the old file path
        if ($vendor->vehicle_file_path) {
            // Delete the old file
            Storage::disk('linode')->delete($vendor->vehicle_file_path);
        }

    }

    // Similar logic for other files
    // ...

    return $filePaths;
}


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



}
