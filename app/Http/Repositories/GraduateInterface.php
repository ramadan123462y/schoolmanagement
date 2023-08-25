<?php


namespace App\Http\Repositories;

interface GraduateInterface
{


    public function index();
    public function create();
    public function soft_delete_students($request);
    public function restore_students($request);
    public function destroy_students($request);
}
