<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
                'address' => $faker->address,
                'phoneNumber' => $faker->phoneNumber,
                'created_at' => now(),
                'update_at' => now()
            ]);
        }
    }
}
