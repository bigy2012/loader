<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('1234'),
            ],

        ];


        foreach ($user as $key => $value) {
            User::create($value);
        }

    }
}
