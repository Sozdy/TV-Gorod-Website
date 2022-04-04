<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Laravel\Scout\Searchable;

class News extends Model
{
//    use Searchable;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

//     public function toSearchableArray()
//     {
//         $array = $this->toArray();

//         return array(
//             'slug' => $array['slug'],
//             'title' => $array['title'],
//             'short_description' => $array['short_description'],
//             'description' => $array['description'],
//             'text_author' => $array['text_author'],
//             'photo_author' => $array['photo_author'],
//             'published_at' => $array['published_at'],
//         );
//     }

    protected $table = "news";

    protected $fillable = [
        "title",
        "slug",
        "short_description",
        "description",
        "video_link",
        "is_hot",
        "is_first",
        "is_main",
        "views",
        "news_category_id",
        "text_author",
        "photo_author",
        "published_at",
        "export_news",
        "export_social_webs",
        "export_telegram",
        "export_description",
    ];

    public static function getNeighbours($count = 5)
    {
        return News::where("news_category_id", NewsCategories::$neighbours)
            ->orderBy("published_at", "desc")
            ->limit($count ?? 5)
            ->get();
    }

    public static function getInFrame($count = 1)
    {
        return News::where("news_category_id", NewsCategories::$in_frame)
            ->orderBy("published_at", "desc")
            ->limit($count ?? 1)
            ->get();
    }

   public static function search($search_query)
   {
       $query = News::query($search_query);
       $columns = Schema::getColumnListing('news');
       foreach($columns as $column)
           $query->orWhere($column, 'LIKE', '%' . $search_query . '%');
       return $query;
   }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
