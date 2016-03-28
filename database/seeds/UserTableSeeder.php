<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        //User::create(['email' => 'foo@bar.com']);
        //['first_name','last_name', 'email','password'];
        User::create(['first_name' => 'Jahzeel','last_name' => 'Coss','email' => 'a@a.com','password' => bcrypt('password')]);
        User::create(['first_name' => 'usuario1','last_name' => 'usuario1','email' => 'usuario1@a.com','password' => bcrypt('password')]);
        User::create(['first_name' => 'usuario2','last_name' => 'usuario2','email' => 'usuario2@a.com','password' => bcrypt('password')]);       
        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10).'@a.com',
            'password' => bcrypt('password'),
        ]);
        }      
        
    }

}