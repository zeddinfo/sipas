<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTransactionCorrection extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function mailTransaction()
    {
        return $this->belongsTo(MailTransaction::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
