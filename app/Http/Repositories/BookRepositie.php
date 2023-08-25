<?php

namespace App\Http\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Librarry;
use Illuminate\Http\Request;
use App\Http\Traits\FilemanagementTrait;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Response;


class BookRepositie implements BookInterface
{
    use FilemanagementTrait;
    public function index()
    {
        $books = Librarry::all();
        return view('pages.Library.index', compact('books'));
    }
    //----------------------------------------------------

    public function create()
    {
        $grades = Grade::all();
        return view('pages.Library.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            // upload file---------------------------
            $this->upload_file('file_name', 'Books', $request, 'upload_books');
            // store book ---------------------------
            $this->store_book($request);
            return  redirect('book')->with('message', "Data Aded Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $grades = Grade::all();
        $book =  Librarry::find($id);
        return view('pages.Library.edit', compact('book', 'grades'));
    }
    //----------------------------------------------------

    public function update($request)
    {
        try {
            $filename = '';
            if (!empty($request->file('file_name'))) {
                $filename = $request->file('file_name')->getClientOriginalName();
            } else {
                $filename = $request->oldfile_name;
            }
            $this->update_book($request, $filename);
            if (!empty($request->file('file_name'))) {
                $this->update_file('oldfile_name', 'file_name', 'Books', $request, 'upload_books');
                $this->upload_file('file_name', 'Books', $request, 'upload_books');
            }
            return redirect('book')->with('message', "Data Updated Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    //----------------------------------------------------



    public function destroy($request)
    {
        try {
            Librarry::find($request->id)->delete();
            $this->delete_file('Books', $request, 'file_name');
            return redirect('book')->with('message', "Data Deleted Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    //----------------------------------------------------


    public function download_file($filename)
    {

        return  $this->download_filetrait('Books', $filename);
    }
    //----------------------------------------------------

    private function store_book($request)
    {
        Librarry::create([
            'file_name' => $request->file('file_name')->getClientOriginalName(),
            'title' => $request->title,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => 1,

        ]);
    }
    //----------------------------------------------------

    private function update_book($request, $filename)
    {

        Librarry::find($request->id)->update([
            'file_name' => $filename,
            'title' => $request->title,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => 1,
        ]);
    }
    //----------------------------------------------------

}
