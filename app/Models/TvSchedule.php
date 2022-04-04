<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TvSchedule extends Model
{
    protected $fillable = ["datetime", "program_name", "age_rating"];

    public $timestamps = false;

    public static function getByDay($date)
    {
        return TvSchedule::whereBetween('datetime', [$date." 00:00:00", $date." 23:59:59"])->get();
    }

    public static function search($search_query)
    {
        $query = TvSchedule::query($search_query);
        $columns = Schema::getColumnListing('tv_schedules');
        foreach($columns as $column)
            $query->orWhere($column, 'LIKE', '%' . $search_query . '%');
        return $query->orderBy("id", "desc")->get();
    }
}
