<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate data by factory
        factory(App\User::class, 20)->create();
        
        $faker = Faker::create();

        // Generate data by Seeder
        $user = [
            'name' => 'superadmin',
            'back_name' => 'admin',
            'address' => 'mlaten',
            'city' => 'mojokerto',
            'region' => 'puri',
            'phone' => '081615227898',
            'age' => '18',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('superadmin'),
            'token' => Str::random(20),
            'foto' => $faker->imageUrl($width = 200, $height = 200),
            'role' => 'superadmin',
            'remember_token' => str::random(10),
            'created_at' => Carbon::now(),

        ];

        \App\User::insert($user);
    }
}
