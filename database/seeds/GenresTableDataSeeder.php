<?php

use Illuminate\Database\Seeder;

class GenresTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([[
            'name' => 'Genre-1',
        ],[
            'name' => 'Genre-2',
        ],[
            'name' => 'Genre-3',
        ],[
            'name' => 'Genre-4',
        ],[
            'name' => 'Genre-5',
        ]]);
    }
}
