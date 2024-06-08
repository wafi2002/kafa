<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function timetablelist()
{
    // no need to define anything here, just make sure the model exists
}

    use HasFactory;
}
