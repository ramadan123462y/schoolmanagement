<?php

namespace App\Http\Repositories;

interface Student_interface
{

    public function index();
    public function create();
    public function ajax_get_classroom($grade_id);
    public function ajax_get_sections($classroom_id);
    public function store($request);
    public function edit($id);
    public function update($request);
    public function delete($request);
    public function show_student($id);
    public function uploade_new_image( $request);
    public function Download_image($student_id, $student_image);
    public function delete_image($id_image, $student_id, $student_image);

}
