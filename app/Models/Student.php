<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'reg_no',
        'name',
        'nic',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
