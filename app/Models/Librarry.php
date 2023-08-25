<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarry extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_name',
        'title',
        'grade_id',
        'classroom_id',
        'section_id',

        'teacher_id',

    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
