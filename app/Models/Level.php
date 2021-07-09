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
    const LEVEL_KETUM = "Ketua Umum";
    const LEVEL_SEKRETARIS = "Sekretaris";
    const LEVEL_KABID = "Kepala Bidang";
    const LEVEL_KADEP = "Kepala Departemen";
    const LEVEL_ANGGOTA = "Anggota";

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
        if ($this->name === 'Admin') {
            return 'Admin';
        } elseif ($this->name === 'TU') {
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
        $level = $this->getSameLevel();
        $index = array_search($level->name, $order);


        if ($index == 0) {
            return null;
        }

        return Level::where('name', $order[$index - 1])->first();
    }

    public function getLowerLevel($mail_type = 'out')
    {
        $order = config('sipas.mail_order.' . $mail_type);
        $level = $this->getSameLevel();
        $index = array_search($level->name, $order);

        if ($index == count($order) - 1) {
            return null;
        }
        return Level::where('name', $order[$index + 1])->first();
    }
}
