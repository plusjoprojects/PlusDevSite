<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class templates extends Model
{
    use HasFactory;
    protected $fillable = ['categories_id','countries_id','message','file'];
    public $with = ['categories'];

    public function categories() {
        return $this->belongsTo('App\Models\categories');
    }
}
