<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['name'=>'rafi','email'=> 'rafi@gmail.com','password'=>'123456'],
            ['name'=>'aftab','email'=> 'aftab@gmail.com','password'=>'123456'],
            ['name'=>'afrin','email'=> 'afrin@gmail.com','password'=>'123456'],
        ];
        User::insert($users);
    }
}
