<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ["link", "name", "is_active", "ads_position_id", "order"];

    public $timestamps = false;
}
