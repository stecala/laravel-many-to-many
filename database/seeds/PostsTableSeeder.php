<?php

use App\Models\Post;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user=User::all();

        for ($i=0; $i < 20; $i++) { 
            $newPost= new Post();
            $newPost->user_id=$faker->randomElement($user)->id;
            $newPost->description=$faker->realText();
            $newPost->img_post=$faker->imageUrl();
            $newPost->post_date=$faker->dateTimeThisYear();
            $newPost->save();
        }
    }
}
