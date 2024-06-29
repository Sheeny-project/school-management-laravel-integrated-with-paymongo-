<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subject;
use App\Models\Status;
class Enrolled extends Model
{
    use HasFactory;
    protected $table = 'enrolled_tbl';
    protected $fillable = [
        'user_id',
        'subject_id',
        'status_id',
    ];
    public function join_user() {
        return $this->belongsTo(User::class, 'user_id');
    }public function join_subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }public function join_status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
