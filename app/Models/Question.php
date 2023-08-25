<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'answers',
        'right_answer',
        'score',
        'quize_id'
    ];

    public function quize()
    {

        return $this->belongsTo(Quize::class, 'quize_id');
    }
}
