<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'guru1',
                'name'=>'Guru 1',
                'email'=>'guru1@email.com',
                'role'=>'guru',
                'password'=> bcrypt('Qwerty_1234'),
            ],
            [
                'username' => 'guru2',
                'name'=>'Guru 2',
                'email'=>'guru2@email.com',
                'role'=>'guru',
                'password'=> bcrypt('][poiu09'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
