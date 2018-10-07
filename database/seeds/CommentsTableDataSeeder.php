<?php

use Illuminate\Database\Seeder;

class CommentsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([[
            'name' => 'Comment Name - 1',
            'description' => 'Comment Description 1',
            'film_id' => 1,
        ],[
            'name' => 'Comment Name - 2',
            'description' => 'Comment Description 2',
            'film_id' => 2,
        ],[
            'name' => 'Comment Name - 3',
            'description' => 'Comment Description 3',
            'film_id' => 3,
        ],[
            'name' => 'Comment Name - 4',
            'description' => 'Comment Description 4',
            'film_id' => 4,
        ],[
            'name' => 'Comment Name - 5',
            'description' => 'Comment Description 5',
            'film_id' => 5,
        ]]);
    }
}
