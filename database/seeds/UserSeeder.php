<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        $users = [
            [
                'name' => 'mario',
                'email' => 'mario@mario.mario',
                'password' => Hash::make('mario'),
            ],
            [
                'name' => 'dario',
                'email' => 'dario@dario.dario',
                'password' => Hash::make('dario'),
            ],
            [
                'name' => 'ciccio',
                'email' => 'ciccio@ciccio.ciccio',
                'password' => Hash::make('ciccio'),
            ],
            [
                'name' => 'ciro',
                'email' => 'ciro@ciro.ciro',
                'password' => Hash::make('ciro'),
            ],
            [
                'name' => 'gino',
                'email' => 'gino@gino.gino',
                'password' => Hash::make('gino'),
            ]
            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
