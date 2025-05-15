<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'subject_id',
        'attendance_date',
        'present',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

