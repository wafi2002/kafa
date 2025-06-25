<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parents extends Model
{
    use HasFactory,SoftDeletes;

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


