<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected    $fillable = [
        'score',
        'date',
        'quize_id',
        'student_id',
        'abuse',
    ];


    public function student()
    {

        return $this->belongsTo(Student::class);
    }
    public function quize()
    {

        return $this->belongsTo(Quize::class);
    }
}
