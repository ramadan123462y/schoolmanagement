<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_fee extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function student(){

        return $this->belongsTo(Student::class,'student_id');
    }
}
