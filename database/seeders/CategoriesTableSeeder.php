<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=>"flowers", "status"=>1, "description"=>"Best flowers"],
            ['name'=>"bouquet", "status"=>1, "description"=>"Cool bouquet"],
        ];

        foreach ($categories as $category) {
            # code...
            \DB::table('categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'status' => $category['status'],
                'created_at'=>now(),
                'updated_at'=>now()
                ]
            );
        }
        // \DB::insert('insert into categories (name, description, status, created_at, updated_at) values (?, ?, ?, ?, ?)', ['Dayle', 'Dayle description', 1, now(), now()]);
    }
}
