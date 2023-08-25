<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function nationalitie()
    {

        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }
    public function blood()
    {

        return $this->belongsTo(Blood::class, 'blood_id');
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


        return $this->belongsTo(Section::class, 'section_id');
    }
    public function parent()
    {

        return $this->belongsTo(My_Parent::class, 'parent_id');
    }
    public function images(): MorphMany
    {


        return $this->morphMany(image::class, 'imageable');
    }
    public function student_accounts(){
        return $this->hasMany(StudentAccount::class,'student_id');


    }
    public function attendances(){

        return $this->hasMany(Attendance::class,'student_id');
    }
    public function degress(){

        return $this->hasMany(Degree::class);
    }
}
