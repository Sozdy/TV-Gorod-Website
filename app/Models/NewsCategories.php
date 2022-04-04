<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    /**
     * @var mixed
     */
    protected $table = "news_categories";

    static $neighbours = 2;
    static $in_frame = 7;

    protected $fillable = [
        "name",
        "slug",
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
