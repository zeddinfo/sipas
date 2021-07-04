<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailAttributeTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }

    public function mailAttribute()
    {
        return $this->belongsTo(MailAttribute::class);
    }
}
