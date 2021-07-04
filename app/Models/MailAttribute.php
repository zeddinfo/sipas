<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function mails()
    {
        return $this->belongsToMany(Mail::class, MailAttributeTransaction::class);
    }
}
