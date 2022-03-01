<?php

use Illuminate\Database\Seeder;
use App\Model\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->words(4, true);
            $newPost->content = $faker->paragraphs(5, true);
            $newPost->slug = Str::slug($newPost->title . "-$i", '-');
            $newPost->save();
        }
    }
}
