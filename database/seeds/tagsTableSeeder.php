<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;


class tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['salute', 'cultura', 'sport', 'politica', 'cronaca', 'esteri', 'english', 'scuola'];

        foreach($tags as $tag){
            $tag = new Tag();
            $tag->name = $tag;
            $tag->save();
        }
    }
}
