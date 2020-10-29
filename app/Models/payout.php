<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payout extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','phone','note','amount','status'];
}
