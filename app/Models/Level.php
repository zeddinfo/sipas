<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function belongsToLevel()
    {
        return $this->belongsTo(Level::class, 'same_as_id');
    }

    public function hasManyLevels()
    {
        return $this->hasMany(Level::class, 'same_as_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
