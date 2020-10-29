<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approves extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','numbers_id','image','note','approve'];

    public $with = ['numbers'];

    public function User() {
        return $this->belongsTo('App\Models\User');
    }

    public function numbers() {
        return $this->belongsTo('App\Models\numbers');
    }
}
