<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email', 'lstephen1214@gmail.com')->first();

        if(!$user) {
            User::create([
                'name' => 'Lekan Stephen',
                'email' => 'lstephen1214@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'superadmin' => 1
            ]);
        }


        // App\User::create([
        //     'name' => 'LStephen',
        //     'email' => 'admin@escritor.com',
        //     'password' => bcrypt('password')
        // ]);
    }
}
