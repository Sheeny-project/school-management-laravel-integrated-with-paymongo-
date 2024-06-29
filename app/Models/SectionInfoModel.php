<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionInfoModel extends Model
{
    use HasFactory;
    protected $table = 'section_info_tbl';
    protected $fillable = [
        'name',
    ];
}
