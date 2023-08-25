<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;


class My_Parent extends Authenticatable
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['Name_Father', 'Job_Father', 'Name_Mother', 'Job_Mother'];
    protected $guarded = [];

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
    public function parent_attchements()
    {

        return $this->hasMany(Parent_attchement::class);
    }
    public function students()
    {

      return  $this->hasMany(Student::class,'parent_id');
    }
}
