<?php

use Illuminate\Database\Seeder;

class PivotesTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pivotes')->insert([[
            'film_id' => 1,
            'genre_id' => 1,
        ],[
            'film_id' => 1,
            'genre_id' => 4,
        ],[
            'film_id' => 2,
            'genre_id' => 2,
        ],[
            'film_id' => 2,
            'genre_id' => 5,
        ],[
            'film_id' => 3,
            'genre_id' => 3,
        ],[
            'film_id' => 4,
            'genre_id' => 1,
        ],[
            'film_id' => 4,
            'genre_id' => 3,
        ],[
            'film_id' => 5,
            'genre_id' => 4,
        ],[
            'film_id' => 5,
            'genre_id' => 1,
        ]]);
    }
}
