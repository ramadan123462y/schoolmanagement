<?php

namespace App\Http\Repositories;

interface Section_interface
{

    public function index();
    public function getClasses($grade_id);
    public function store($request);
    public function update($request);
    public function delete($request);
}
