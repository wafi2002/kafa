<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'subjectName',
    ];

    public function results()
    {
        return $this->hasMany(Result::class, 'subject_id'); // Assuming 'subject_id' is the foreign key in the 'results' table
    }
}
