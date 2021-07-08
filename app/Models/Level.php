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

    const UP_LEVEL_ORDER = [
        Level::LEVEL_TU,
        Level::LEVEL_KETUM,
        Level::LEVEL_SEKRETARIS,
        Level::LEVEL_KABID,
        Level::LEVEL_KADEP,
        Level::LEVEL_ANGGOTA,
    ];

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

    public function getUpperLevel()
    {
        $index = array_search($this->name, Level::UP_LEVEL_ORDER) - 1;
        if ($index == -1) {
            return false;
        }

        return Level::where('name', Level::UP_LEVEL_ORDER[$index])->first();
    }

    public function getSameLevel()
    {
        return $this->sameLevel ?? $this;
    }
}
