<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index(){
    return view('dashboard');
   }
}
