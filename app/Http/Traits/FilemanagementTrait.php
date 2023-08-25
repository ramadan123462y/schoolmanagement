<?php

namespace App\Http\Traits;

trait FilemanagementTrait
{
    // ------------------------upload_file----------------
    public function upload_file($nameinput, $folder, $request, $disk)
    {
        $file = $request->file($nameinput);
        $file->storeAs($folder, $file->getClientOriginalName(), $disk);
    }
    // ------------------------update_file----------------
    public function update_file($old_nameinput, $new_nameinput, $folder, $request, $disk)
    {
        $this->delete_file($folder, $request, $old_nameinput);
            $this->upload_file($new_nameinput, $folder, $request, $disk);


    }
    // ------------------------delete_file----------------
    public function delete_file($folder, $request, $old_nameinput)
    {
        if (file_exists(public_path($folder . '/' . $request->$old_nameinput))) {
            unlink(public_path($folder . '/' . $request->$old_nameinput));
        }
    }
    // ------------------------download_file----------------
    public function download_filetrait($folder, $filename)
    {
        if (file_exists(public_path($folder . '/' . $filename))) {

            return  response()->download(public_path($folder . '/' . $filename));
        } else {

            return redirect()->back()->withErrors(['error' => "file not exist"]);
        }
    }
}
