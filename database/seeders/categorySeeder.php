<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use Faker\Factory as Faker;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i <= 20; $i++ ){
            $category = new Categories;
            $category -> name = $faker->name;
            $category -> admin_id = "1";
            $category -> save();
        }
    }
}
