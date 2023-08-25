<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_attchement extends Model
{
    use HasFactory;
    protected $fillable = [


        'file_name',
        'parent_id',
    ];
    public function  my__parent(){

        return $this->belongsTo(My_Parent::class);
    }
}
