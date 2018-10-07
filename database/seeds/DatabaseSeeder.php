<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FilmsTableDataSeeder::class);
         $this->call(GenresTableDataSeeder::class);
         $this->call(PivotesTableDataSeeder::class);
         $this->call(CommentsTableDataSeeder::class);
    }
}
