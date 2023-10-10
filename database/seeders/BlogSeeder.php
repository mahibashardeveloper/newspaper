<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogs;
use Faker\Factory as Faker;
use App\Services\MediaService;
use Illuminate\Support\Facades\Storage;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 20; $i++) {
            $blog = new Blogs;
            $blog->admin_id = "1";
            $blog->title = $faker->title;
            $blog->avatar = $faker->image;
            $blog->description = $faker->text;
            $blog->save();
        }
    }
}

