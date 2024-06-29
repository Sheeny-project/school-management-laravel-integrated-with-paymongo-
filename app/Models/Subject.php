<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Year;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Enrolled;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject_tbl';
    protected $fillable = [
        'course_id',
        'name',
        'subject_code',
        'subject_description',
        'lec_units',
        'lab_units',
        'semester',
        'year',
    ];

    public function get_year(){
        return $this->belongsTo(Year::class, 'year');
    }
    public function get_semester(){
        return $this->belongsTo(Semester::class, 'semester');
    }
    public function get_course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function enrolled(){
        return $this->hasMany(Enrolled::class, 'subject_id');
    }
}
