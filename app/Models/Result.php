<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'studentIC',
        'subject_id',
        'resultMark',
        'grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentIC');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
