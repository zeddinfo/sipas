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

    /**
     * @param string $mail_type
     */
    public function getMailOutOrderLevel($direction = 'upper')
    {
        $order = config('sipas.mail_order.out');
        $index = array_search($this->name, $order);

        if ($index == 0) {
            return null;
        }

        $direction == 'upper' ? $index = ($index - 1) : $index = ($index + 1);

        return Level::where('name', $order[$index])->first();
    }

    public function getSameLevel()
    {
        return $this->sameLevel ?? $this;
    }
}
