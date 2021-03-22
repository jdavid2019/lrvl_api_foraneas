<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           ['category_name' => 'Action'],
           ['category_name' => 'Terror']
       ];

       foreach ($data as $value) {
           DB::table('categories')->insert([
               'category_name' => $value['category_name']
           ]);
       }
    }
}
