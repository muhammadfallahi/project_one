<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->times(25)->has(Image::factory()->count(1))->create();
        // Category::factory()->times(25)->create();

        for ($i=0; $i < 50 ; $i++) { 
            Category::factory()->has(Image::factory()->count(rand(0,1)))->create();
        }
    }
}
