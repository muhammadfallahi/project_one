<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 100 ; $i++) { 
            // Post::factory()->has(Category::factory()->count(rand(1,5)))->has(Tag::factory()->count(rand(3,10)))->has(Image::factory()->count(1))->create();
            Post::factory()->has(Image::factory()->count(1))->create();
            // Post::factory()->has(Category::pluck('id')->count(rand(1,5)))->has(Tag::pluck('id')->count(rand(3,10)))->has(Image::factory()->count(1))->create();
         
            
        }
       
            foreach (Post::all() as $post){
                for ($i=0; $i <rand(3,10) ; $i++) { 
                $post->tags()->attach(rand(1,100));
            
            }
        }


        foreach (Post::all() as $post){
            for ($i=0; $i <rand(1,5) ; $i++) { 
            $post->categories()->attach(rand(1,50));
        
        }
    }
        
    }
}
