<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    const LEVEL_ADMIN = "Admin";
    const LEVEL_TU = "TU";
    const LEVEL_KADIS = "Kepala Dinas";
    const LEVEL_SEKRETARIS = "Sekretaris";
    const LEVEL_KASUBBAG = "Kepala Sub Bagian";
    const LEVEL_KABID = "Kepala Bidang";
    const LEVEL_KASIE = "Kepala Seksie";
    const LEVEL_STAF_SUBBAG = "Staf Sub Bagian";
    const LEVEL_STAF_SEKSIE = "Staf Seksie";

    // Relation Function
    public function sameLevel()
    {
        return $this->belongsTo(Level::class, 'same_as_id');
    }

    public function sameLevels()
    {
        return $this->hasMany(Level::class, 'same_as_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Custom Function
    public function getRole()
    {
        if ($this->getSameLevel()->name === 'Admin') {
            return 'Admin';
        } elseif ($this->getSameLevel()->name === 'TU') {
            return 'TU';
        } else {
            return 'User';
        }
    }

    public function getSameLevel()
    {
        return $this->sameLevel ?? $this;
    }

    public function getUpperLevel($mail_type = 'out')
    {
        $order = config('sipas.mail_order.' . $mail_type);

        foreach ($order as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $val) {
                    if ($val == $this->name) {
                        return Level::where('name', $key)->first();
                    }
                }
            } else {
                if ($value == $this->name) {
                    return Level::where('name', $key)->first();
                }
            }
        }

        return null;
    }

    public function getLowerLevel($mail_type = 'out')
    {
        $order = config('sipas.mail_order.' . $mail_type);

        $level = $this->getSameLevel();

        if (!array_key_exists($level->name, $order)) {
            return null;
        }

        if (is_array($order[$level->name])) {
            return Level::whereIn('name', $order[$level->name])->get();
        } else {
            return Level::where('name', $order[$level->name])->get();
        }
    }
}
