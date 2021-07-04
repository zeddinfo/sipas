<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function mailVersions()
    {
        return $this->hasMany(MailVersion::class);
    }

    public function mailTransactionCorrection()
    {
        return $this->hasOne(MailTransactionCorrection::class);
    }
}
