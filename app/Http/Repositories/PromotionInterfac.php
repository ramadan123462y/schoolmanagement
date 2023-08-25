<?php

namespace App\Http\Repositories;

interface PromotionInterfac
{

    public function index();
    public function create();
    public function store_promotion($request);
    public function destroy_promotion($request);
}
