<?php

namespace App\Http\Repositories;

interface teacher_interface
{

    public function get_all_teacher();
    public function create();
    public function store_teacher($request);
    public function edit_teacher($id);
    public function get_teacher_by_id($id);
    public function update_teacher($request);
    public function delete_teacher($id);
}
