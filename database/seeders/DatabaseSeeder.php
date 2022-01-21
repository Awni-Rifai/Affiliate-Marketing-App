<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Admin account
        User::create([
          'name' =>'Awni',
          'username'=>'awni',
          'email'   =>'awni@gmail.com',
          'password'=>Hash::make('awni1998'),
          'role_id' =>'2',

        ]);
        //normal user
        User::create([
            'name'          =>'Awni',
            'username'      =>'awni98',
            'email'         =>'awni98@gmail.com',
            'password'      =>Hash::make('awni1998'),
            'role_id'       =>'1',
            'refers_number' =>20

        ]);
        \App\Models\User::factory(20)->create();
    }
}
