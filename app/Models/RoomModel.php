<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class RoomModel extends Model
{
    use HasFactory;
    protected $table = 'room_tbl';
    protected $fillable = [
        'room_number',
        'room_type_id',
    ];

    public function get_type(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
