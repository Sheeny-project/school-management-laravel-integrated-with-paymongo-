<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinanceEventModel;
use App\Models\User;
use App\Models\Status;

class Accountability extends Model
{
    use HasFactory;
    protected $table = 'accountability_tbl';
    protected $fillable = [
        'user_id',
        'accountability',
        'amount',
        'status',
    ];
    public function join_user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function join_account() {
        return $this->belongsTo(FinanceEventModel::class, 'accountability');
    }
    public function join_status() {
        return $this->belongsTo(Status::class, 'status');
    }
}
