<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens;
    use  HasFactory;
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable = [
        'Email',
        'Password',
        'Name',
        'Specialization_id',
        'Gender_id',
        'Joining_Date',
        'Address',
    ];

    protected $hidden = [
        // 'Password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'Password' => 'hashed',
    ];
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'Gender_id');
    }
    public function specialization()
    {

        return $this->belongsTo(specialization::class, 'Specialization_id');
    }
    public function sections()
    {

        return $this->belongsToMany(Section::class, 'section_teacher');
    }
    public function quizes(){

        return $this->hasMany(Quize::class);
    }
}
