<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TvProgram extends Model
{
    protected $fillable = ["name", "playlist_id", "order", "active"];

    public $timestamps = false;

    public static function search($search_query)
    {
        $query = TvProgram::query($search_query);
        $columns = Schema::getColumnListing('tv_programs');
        foreach($columns as $column)
            $query->orWhere($column, 'LIKE', '%' . $search_query . '%');
        return $query->orderBy("id", "desc")->get();
    }
}
