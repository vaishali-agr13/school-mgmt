<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'parent_name',
        'parent_mobile',
        'class'
    ];

    public function attendance()
    {
       return $this->hasOne(Attendance::class)
        ->where('date', date('Y-m-d'));
    }
}