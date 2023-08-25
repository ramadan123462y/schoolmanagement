<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['Name'];

    protected   $fillable = [

        'Name',
        'Notes',
    ];
    public function Classrooms(){

        return $this->hasMany(Classroom::class);
    }

    public function sections(){

        return $this->hasMany(Section::class);
    }

}
