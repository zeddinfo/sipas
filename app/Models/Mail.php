<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function attributes()
    {
        return $this->belongsToMany(MailAttribute::class, MailAttributeTransaction::class);
    }

    public function mailVersions()
    {
        return $this->hasMany(MailVersion::class);
    }
}
