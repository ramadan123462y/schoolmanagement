<?php

namespace App\Http\Controllers;

use App\Http\Traits\FilemanagementTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    use FilemanagementTrait;
    public function index()
    {
        $setting = Setting::first();

        return view('pages.Setting.index', compact('setting'));
    }
    // -----------------------------------------
    public function update(SettingRequest $request)
    {
        try {
            if (!empty($request->file('New_file'))) {
                // -----------------------------------------
                $this->delete_file('Logo', $request, 'old_file');
                // -----------------------------------------
                $this->upload_file('New_file', 'Logo', $request, 'upload_settings');
                // -----------------------------------------
                $new_file = $request->file('New_file')->getClientOriginalName();
            } else {
                $new_file = $request->old_file;
            }
            // -----------------------------------------
            $this->update_setting($request, $new_file);
            return redirect()->back()->with('message', 'Data Updated Successfully');
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // -----------------------------------------
    private function update_setting($request, $new_file)
    {
        Setting::first()->update([
            'current_session' => $request->current_session,
            'school_title' => $request->school_title,
            'school_name' => $request->school_name,
            'end_first_term' => $request->end_first_term,
            'end_second_term' => $request->end_second_term,
            'phone' => $request->phone,
            'address' => $request->address,
            'school_email' => $request->school_email,
            'logo' => $new_file,
        ]);
    }
}
