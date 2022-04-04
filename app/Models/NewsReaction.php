<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsReaction extends Model
{
    use HasFactory;

    protected $fillable = ["news_id", "reaction_id", "count"];

    public $timestamps = false;
}
