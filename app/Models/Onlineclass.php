<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlineclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic',
        'subject_id',
        'grade_id',
        'classroom_id',
        'user_id',
        'start_at',
        'duration',
        'password',
        'start_url',
        'join_url',
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

}
