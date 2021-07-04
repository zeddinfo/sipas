<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function belongsToDepartment()
    {
        return $this->belongsTo(Department::class, 'depends_on_id');
    }

    public function hasManyDepartments()
    {
        return $this->hasMany(Department::class, 'depends_on_id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
