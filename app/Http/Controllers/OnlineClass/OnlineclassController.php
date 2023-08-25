<?php

namespace App\Http\Controllers\OnlineClass;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Onlineclass;
use App\Models\User;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineclassController extends Controller
{

    public function index()
    {
        $online_classes = Onlineclass::all();
        return view('pages.onlineClasses.index', compact('online_classes'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.onlineClasses.add', compact('Grades'));
    }


    public function store(Request $request)
    {






    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
