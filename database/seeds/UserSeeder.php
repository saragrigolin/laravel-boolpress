<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->email = 'Admin@admin.it';
        $string = '12345678';
        $newUser->password = Hash::make($string);
        $newUser->save();

        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            $string = '12345_ABC';

            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}
