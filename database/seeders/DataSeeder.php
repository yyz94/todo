<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'timezone' => 'Asia/Rangoon',
            'email'  => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        Todo::insert([
            [
                'content' => 'Meeting',
                'deadline' => '2022-02-11 13:30',
                'user_id' => 1
            ],
            [
                'content' => 'Go to shopping',
                'deadline' => '2022-02-12 9:00',
                'user_id' => 1
            ],
            [
                'content' => 'To meet customer',
                'deadline' => '2022-02-13 10:30',
                'user_id' => 1
            ],
            [
                'content' => 'Check the stock market',
                'deadline' => '2022-02-11 4:30',
                'user_id' => 1
            ]
        ]);
    }
}
