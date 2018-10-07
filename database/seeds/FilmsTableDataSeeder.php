<?php

use Illuminate\Database\Seeder;

class FilmsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('films')->insert([[
            'name' => 'Film-1',
            'description' => 'This is film-1',
            'realease_date' => '2018-10-02 06:14:18',
            'rating' => '4',
            'country' => 'india',
            'ticket_price' => '500',
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.png',
        ],[
            'name' => 'Film-2',
            'description' => 'This is film-2',
            'realease_date' => '2018-11-12 06:14:18',
            'rating' => '4',
            'country' => 'india',
            'ticket_price' => '500',
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.png',
        ],[
            'name' => 'Film-3',
            'description' => 'This is film-3',
            'realease_date' => '2018-12-12 06:14:18',
            'rating' => '4',
            'country' => 'india',
            'ticket_price' => '500',
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.png',
        ],[
            'name' => 'Film-4',
            'description' => 'This is film-4',
            'realease_date' => '2018-11-22 06:14:18',
            'rating' => '4',
            'country' => 'india',
            'ticket_price' => '500',
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.png',
        ],[
            'name' => 'Film-5',
            'description' => 'This is film-5',
            'realease_date' => '2018-10-22 06:14:18',
            'rating' => '4',
            'country' => 'india',
            'ticket_price' => '500',
            'photo' => 'https://www.gstatic.com/webp/gallery3/1.png',
        ]]);
    }
}
