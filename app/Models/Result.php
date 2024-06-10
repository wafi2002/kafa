<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'resultMark',
        'subject_id',
        'studentIC',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

}
