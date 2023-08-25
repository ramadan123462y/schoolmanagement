<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'current_session',
        'school_title',
        'school_name',
        'end_first_term',
        'end_second_term',
        'phone',
        'address',
        'school_email',
        'logo',
    ];
}
