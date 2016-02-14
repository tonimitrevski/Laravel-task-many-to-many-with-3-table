<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Toni Mitrevski',
                'email' => 'mitrevski@mail.com',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($users as $user) :
            \App\User::create($user);
        endforeach;
    }
}
