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
        return $this->belongsTo(User::class, 'teacherID', 'id');
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
// Define the table if it's not the plural form of the model name
protected $table = 'timetable_requests';

// Specify the primary key
protected $primaryKey = 'requestID';

// If the primary key is not an auto-incrementing integer
public $incrementing = false;

// If the primary key is not an integer
protected $keyType = 'string';

}
