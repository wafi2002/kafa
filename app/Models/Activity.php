<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['activityName', 'activityDescription', 'activityDate', 'activityTime', 'activityTentative'];

    public function postMortems()
    {
        return $this->hasMany(PostMortem::class);
    }
}
