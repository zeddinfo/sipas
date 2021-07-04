<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function mailTransactions()
    {
        return $this->hasMany(MailTransaction::class);
    }
}
