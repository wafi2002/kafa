<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
    ];

    public function teacher()
{
    return $this->belongsTo(User::class, 'teacherID', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'userID');
}
public function requests()
{
    return $this->hasMany(TimetableRequest::class, 'timetableID', 'id');
}
}
