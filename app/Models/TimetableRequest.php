<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableRequest extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacherID', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public $timestamps = false;

    protected $fillable = [
        'teacherID',
        'request_day',
        'request_time',
        'request_subject',
        'request_reason',
    ];
    public function timetable()
{
    return $this->belongsTo(Timetable::class, 'timetableID', 'id');
}
}
