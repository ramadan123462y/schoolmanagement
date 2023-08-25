<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;
    use HasFactory;

    public $translatable = ['Name_Class'];
    protected $fillable = [

        'Name_Class',
        'grade_id',
    ];
    public function grade()
    {


        return $this->belongsTo(Grade::class);
    }
    public function sections()
    {

        $this->hasMany(Section::class);
    }
}
