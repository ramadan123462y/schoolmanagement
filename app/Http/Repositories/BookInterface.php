<?php

namespace App\Http\Repositories;

interface BookInterface{

    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function download_file($filename);


}
