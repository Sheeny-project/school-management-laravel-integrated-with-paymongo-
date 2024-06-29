<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomModel;
use App\Models\Day;
use App\Models\Subject;
use App\Models\SectionInfoModel;

class SectionModel extends Model
{
    use HasFactory;
    protected $table = 'section_tbl';
    protected $fillable = [
        'section_id',
        'slot',
        'subject_id',
        'room_id',
        'time_in',
        'time_out',
        'day_id',
    ];
    public function get_room(){
        return $this->belongsTo(RoomModel::class, 'room_id');
    }
    public function get_day(){
        return $this->belongsTo(Day::class, 'day_id');
    }
    public function get_subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function get_section(){
        return $this->belongsTo(SectionInfoModel::class, 'section_id');
    }
}
