<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10000; $i++) { 
        	DB::table('students')->insert([
            'name' => str_random(8),            
        ]);  
        }   
    }
}
