<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
