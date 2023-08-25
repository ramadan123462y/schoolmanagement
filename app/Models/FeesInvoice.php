<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_date',
        'amount',
        'description',
        'student_id',
        'grade_id',
        'classroom_id',
        'fees_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function fees()
    {
        return $this->belongsTo(Fees::class, 'fees_id');
    }
}
