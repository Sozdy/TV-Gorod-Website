<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads_positions')->insert(['id' => 1, 'name' => "Блок над шапкой сайта" ]);
        DB::table('ads_positions')->insert(['id' => 2, 'name' => "Горизонтальный 1" ]);
        DB::table('ads_positions')->insert(['id' => 3, 'name' => "Горизонтальный 2" ]);
        DB::table('ads_positions')->insert(['id' => 4, 'name' => "Горизонтальный 3" ]);
        DB::table('ads_positions')->insert(['id' => 5, 'name' => "Горизонтальный 4" ]);
        DB::table('ads_positions')->insert(['id' => 6, 'name' => "Вертикальный 1" ]);
        DB::table('ads_positions')->insert(['id' => 7, 'name' => "Вертикальный 2" ]);
    }
}
