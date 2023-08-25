<?php

namespace App\Http\Repositories;

interface Invoice_Interface{


    public function index();
    public function store($request);
     public function show($id);
    public function edit($id);
    public function update($request);
    public function get_mount_byfees($id);
    public function destroy($request);

}
