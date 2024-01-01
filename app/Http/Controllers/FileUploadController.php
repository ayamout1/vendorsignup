<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
{
    public function show($email)
    {
        //get vendor to update his files

        $vendor = DB::connection('suitecrm')->table('vsf_vendornetwork')
        ->where('vendor_email_c', $email) // replace 'email_column_name' with the actual column name for the email in the table
        ->first();

        dd($vendor);
        // Logic to show existing file or upload form
        return view('file.show', compact('vendor'));;
    }

    public function update(Request $request, $email)
    {


        // Validate the request
        $validatedData = $request->validate([
            'file' => 'required|file',
        ]);

        // Handle the file upload
        if ($request->hasFile('file')) {
            $path = $request->file->store('public/files');

            // Save the file path in the database or perform other actions
        }

        // Redirect or return response
        return redirect()->back()->with('success', 'File uploaded successfully!');
    }
}
