<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTransactionLog extends Model
{
    use HasFactory, SoftDeletes;

    const CREATED = 'Dibuat oleh ';
    const UPDATED = 'Diubah oleh ';
    const REVISED = 'Direvisi oleh ';
    const FORWARDED = 'Diteruskan oleh ';
    const DISPOSITED = 'Didisposisikan oleh ';

    protected $guarded = [];

    public function mailTransaction()
    {
        return $this->belongsTo(MailTransaction::class);
    }
}
