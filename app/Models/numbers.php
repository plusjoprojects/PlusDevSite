<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class numbers extends Model
{
    use HasFactory;
    public $with = ['categories','countries'];
    protected $fillable = [
        "categories_id",
        "countries_id",
        "name",
        "phone",
        "udid",
        "synced_to_phone",
        "delete_from_phone",
        "active",
        "user_id",
    ];

    public function categories() {
        return $this->belongsTo('App\Models\categories');
    }
    public function countries() {
        return $this->belongsTo('App\Models\countries');
    }
}
