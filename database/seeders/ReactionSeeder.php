<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactions')->insert([ 'code' => "like" ]);
        DB::table('reactions')->insert([ 'code' => "happy" ]);
        DB::table('reactions')->insert([ 'code' => "surprised" ]);
        DB::table('reactions')->insert([ 'code' => "sad" ]);
        DB::table('reactions')->insert([ 'code' => "angry" ]);
        DB::table('reactions')->insert([ 'code' => "dislike" ]);
    }
}
