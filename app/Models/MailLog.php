<?php

namespace App\Models;

use Composer\Util\Tar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailLog extends Model
{
    use HasFactory, SoftDeletes;

    const LOG_CREATED = 'Dibuat';
    const LOG_UPDATED = 'Diubah';
    const LOG_REVISED = 'Direvisi';
    const LOG_FORWARDED = 'Diteruskan';
    const LOG_DISPOSITED = 'Didisposisikan';

    protected $guarded = [];

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }

    public function getLogMessage()
    {
        $main_log = $this->log . " oleh " .
            $this->user_name . " (" .
            $this->user_level_department . ")";

        $target_log = null;

        if ($this->target_user_name != null) {
            $target_log = " ke " . $this->target_user_name . " (" .
                $this->target_user_level_department . ")";
        }

        return $main_log . $target_log;
    }
}
