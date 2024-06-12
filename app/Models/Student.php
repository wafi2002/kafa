<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'studentIC'; // Specify the primary key

    public $incrementing = false; // Disable auto-incrementing

    protected $fillable = [
        'studentIC',
        'studentName',
        'studentAge',
        'studentGender',
        'studentYear',
    ];

    


}
