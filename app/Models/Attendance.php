<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [

        'student_id',
        'section_id',
        'teacher_id',
        'classroom_id',
        'grade_id',
        'attendence_date',
        'attendence_status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
