<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['Name_Section'];
    protected $fillable = [
        'Name_Section',
        'Status',
        'classroom_id',
        'grade_id',
    ];

    public function grade()
    {
      return  $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroome()
    {
        return $this->belongsTo(Classroom::class, 'classroome_id');
    }
    public function teachers()
    {

        return $this->belongsToMany(Teacher::class, 'section_teacher');
    }
    public function students()
    {

        return $this->hasMany(Student::class);
    }
}
