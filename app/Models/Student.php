<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student_tbl';
    protected $fillable = [
        'student_id',
        'mother_name',
        'mother_contact',
        'mother_age',
        'father_name',
        'father_contact',
        'father_age',
    ];
}
