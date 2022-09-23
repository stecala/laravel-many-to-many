<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts=Post::All();
        $tags=Tag::All();

        foreach($posts as $post){
            //! prendo da Tag in ordine casuale un numero randomico tra 1 e 5 di tag da attaccare a $post
            $randomTags = Tag::inRandomOrder()->limit(rand(1, 5))->get();
            $post->tags()->attach($randomTags);
        }
    }
}
