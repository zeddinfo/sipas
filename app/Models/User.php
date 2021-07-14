<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'name',
        'phone_number',
        'email',
        'password',
        'level_id',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // Relation Method
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function mailTransactions()
    {
        return $this->hasMany(MailTransaction::class);
    }

    public function targetMailTransactions()
    {
        return $this->hasMany(MailTransaction::class, 'target_user_id');
    }


    // Custom Method
    public function hasRole($role)
    {
        return $this->level->getRole() == $role;
    }

    public function getSameUser()
    {
        $level = $this->level->getSameLevel();
        $department = $this->department;

        return User::where([['level_id', $level->id], ['department_id', $department?->id]])->first();
    }

    public function getUpperUser($mail_type = 'out')
    {
        $upper_level = $this->level->getUpperLevel($mail_type);

        if ($upper_level == null) return throw new Exception("Current user has highest level");

        // If Anggota, the upper Department still same
        if ($this->level->name == Level::LEVEL_ANGGOTA) {
            $department = $this->department;
        } else {
            $department = $this->department?->upperDepartment;
        }

        return User::where([['level_id', $upper_level->id], ['department_id', $department?->id]])->first();
    }

    public function getLowerUsers($mail_type = 'out')
    {
        $lower_level = $this->level->getLowerLevel($mail_type);

        if ($lower_level == null) return throw new Exception("Current user has lower level");

        if ($this->department == null) {
            return User::where('level_id', $lower_level->id)->get();
        } else {
            if ($this->department->hasDepartments->count() > 0) {
                $department_ids = $this->department->hasDepartments->pluck('id')->toArray();
            } else {
                $department_ids = [$this->department_id];
            }
            return User::where('level_id', $lower_level->id)->whereIn('department_id', $department_ids)->get();
        }
    }

    public function hasDisposition()
    {
        $disposition_levels = config('sipas.disposition_tag');
        $user_level = $this->level->getSameLevel();

        return in_array($user_level->name, $disposition_levels);
    }

    public function checkLowerUserIds($ids = [])
    {
        $lower_level_ids = $this->getLowerUsers('in')->pluck('id')->toArray();

        foreach ($ids as $user_id) {
            if (!in_array($user_id, $lower_level_ids)) {
                return false;
            }
        }

        return true;
    }

    // public function hasDispositionAccess()
    // {
    //     $order = config('sipas.disposition_tag');
    //     $level = $this->getSameLevel();
    //     $index = array_search($level->name, $order);

    //     if ($index == 0) {
    //         return null;
    //     }

    //     return Level::where('name', $order[$index - 1])->first();
    // }
}
