<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTransaction extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_FORWARD = "FORWARD";
    const TYPE_REVISION = "REVISION";
    const TYPE_DISPOSITION = "DISPOSITION";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id');
    }

    public function mailVersion()
    {
        return $this->belongsTo(MailVersion::class);
    }

    public function logs()
    {
        return $this->hasMany(MailTransactionLog::class);
    }

    public function memo()
    {
        return $this->hasOne(MailTransactionMemo::class);
    }

    public function correction()
    {
        return $this->hasOne(MailTransactionCorrection::class);
    }
}
