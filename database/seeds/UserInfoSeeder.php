<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use App\Model\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $count = $users->count();

        foreach ($users as $user) {
            $newUserInfo = new UserInfo();
            $newUserInfo->phone = $faker->phoneNumber();
            $newUserInfo->address = $faker->address();
            $newUserInfo->user_id = $user->id;

            $newUserInfo->save();
        }
    }
}
