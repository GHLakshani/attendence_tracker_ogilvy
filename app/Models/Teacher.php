<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'subject',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
