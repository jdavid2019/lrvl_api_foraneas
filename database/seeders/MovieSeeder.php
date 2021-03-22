<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            ['name' => 'Rapidos y furiosos' , 'description' => 'Good film','release_date' => '2020-07-07', 'category_id' => 1],
            ['name' => 'Avengers End game' , 'description' => 'Amazing film','release_date' =>'2020-07-07' , 'category_id' => 1],
            ['name' => 'El aro 2' , 'description' => 'Horror film','release_date' =>'2020-07-07' , 'category_id' => 2]
        ];
       foreach ($data as $value) {
           DB::table('movies')->insert(
               [
                   'name' => $value['name'],
                   'description' => $value['description'],
                   'release_date' => $value['release_date'],
                   'category_id' => $value['category_id']
               ]
           );
       }
    }
}
