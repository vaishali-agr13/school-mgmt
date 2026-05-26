<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'class_logo',
        'class_name',
        'teacher_id',
        'teacher_name',
        'fees',
        'age',
        'time',
        'capacity'
    ];
}