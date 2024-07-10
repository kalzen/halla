<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        //dd($request);
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('uploads'),$fileName);

                // Create or update the setting record
                $setting = Setting::updateOrCreate(
                    ['id' => $request->input('setting_id')],
                    ['value' => 'uploads/'.$fileName]
                );
               return response()->json(['success'=>$fileName]);
               // return ->with('success', 'File uploaded and setting updated successfully!');
            } else {
                return redirect()->back()->with('error', 'No file uploaded.');
            }
        } catch (\Exception $e) {
            // Log the error or display it to the UI
            return redirect()->back()->with('error', 'Error uploading file: ' . $e->getMessage());
        }
    }
}
