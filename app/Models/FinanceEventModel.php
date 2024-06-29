<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FinanceEventModel extends Model
{
    use HasFactory;
    protected $table = 'event_tbl';
    protected $fillable = [
        'name',
        'description',
        'price',
        'event_date',
        'added_by',
    ];

    public function get_user(){
        return $this->belongsTo(User::class, 'added_by');
    }
}
