<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'Elena Durante';
        $user->email = 'durante.elena00@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        for ($i = 0; $i < 9; $i++) {
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = bcrypt($faker->word());

            $newUser->save();
        }
    }
}
