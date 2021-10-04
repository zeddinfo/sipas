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
    public function userRoles()
    {
        return $this->hasMany(UserRole::class);
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class, UserRole::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, UserRole::class);
    }

    public function getLevelAttribute()
    {
        return $this->levels()->where('active', true)->first();
    }

    public function getDepartmentAttribute()
    {
        return $this->departments()->where('active', true)->first();
    }

    public function mailTransactions()
    {
        return $this->hasMany(MailTransaction::class);
    }

    public function latestMailTransaction()
    {
        return $this->hasOne(MailTransaction::class)->latestOfMany();
    }

    public function targetMailTransactions()
    {
        return $this->hasMany(MailTransaction::class, 'target_user_id');
    }


    // Custom Method
    public function getLevelDepartment()
    {
        $department = '';
        if ($this->department != null) {
            $department = '-' . $this->department->name;
        }

        return $this->level->name . $department;
    }

    public function hasRole($role)
    {
        return $this->level->getRole() == $role;
    }

    public function getSameUser()
    {
        $level = $this->level->getSameLevel();
        $department = $this->department;

        return User::whereHas('userRoles', function ($query) use ($level, $department) {
            $query->where([['level_id', $level->id], ['department_id', $department?->id], ['active', true]]);
        })->first();
    }

    public function getSameUsers()
    {
        $master_level = $this->level->getSameLevel()->id;
        $lower_levels = $this->level->getSameLevel()->sameLevels->pluck('id');
        $same_levels = $lower_levels->prepend($master_level);

        $department = $this->department;

        return User::whereHas('userRoles', function ($query) use ($same_levels, $department) {
            $query->where([['level_id', $same_levels], ['department_id', $department?->id], ['active', true]]);
        })->get();
    }

    public function getUpperUser($mail_type = 'out')
    {
        $upper_level = $this->level->getUpperLevel($mail_type);

        if ($upper_level == null) return throw new Exception("Current user has highest level");

        // If Anggota, the upper Department still same
        if ($this->level->name == Level::LEVEL_STAF_SEKSIE || $this->level->name == Level::LEVEL_STAF_SUBBAG) {
            $department = $this->department;
        } else {
            $department = $this->department?->upperDepartment;
        }

        return User::whereHas('userRoles', function ($query) use ($upper_level, $department) {
            $query->where([['level_id', $upper_level->id], ['department_id', $department?->id], ['active', true]]);
        })->first();
    }

    public function getLowerUsers($mail_type = 'out')
    {
        $lower_level = $this->level->getLowerLevel($mail_type);
        if ($lower_level == null) return throw new Exception("Current user has lower level");

        if ($this->department == null) {
            return User::whereHas('userRoles', function ($query) use ($lower_level) {
                $query->whereIn('level_id', $lower_level->pluck('id')->toArray())->where('active', true);
            })->get();
        } else {
            if ($this->department->hasDepartments->count() > 0) {
                $department_ids = $this->department->hasDepartments->pluck('id')->toArray();
            } else {
                $department_ids = [$this->department_id];
            }
            return User::whereHas('userRoles', function ($query) use ($lower_level, $department_ids) {
                $query->whereIn('level_id', $lower_level->pluck('id')->whereIn('department_id', $department_ids)->where('active', true)->toArray());
            })->get();
        }
    }

    public function hasDisposition()
    {
        $disposition_levels = config('sipas.disposition_tag');
        $user_level = $this->level->getSameLevel();

        return in_array($user_level->name, $disposition_levels);
    }

    public function hasAllMailAccess()
    {
        $all_mail_access_levels = config('sipas.all_mail_access_tag');
        $user_level = $this->level->getSameLevel();

        return in_array($user_level->name, $all_mail_access_levels);
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
}
