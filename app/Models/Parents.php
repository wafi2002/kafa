<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'parentIC',
        'phoneNo',
        'address',
        'relation',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


