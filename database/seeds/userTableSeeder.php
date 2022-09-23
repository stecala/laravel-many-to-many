<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i=0; $i < 10; $i++) {
            $user= new User();
            $user->name = $faker->userName();
            $user->email= $faker->unique()->email();
            $user->password=Hash::make($faker->password());
            $user->save();
        }

        $myUser= new User();
        $myUser->name= 'Cala';
        $myUser->email= 'ste.cala@gmail.com';
        $myUser->password= Hash::make('ciaociao');
        $myUser->save();
    }
}
