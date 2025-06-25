<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostMortem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['postDescription', 'postDate', 'postStatus', 'activity_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
