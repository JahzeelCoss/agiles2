<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('roles')->delete();
        for ($i=1; $i < 5; $i++) { 
        	 DB::table('courses')->insert([
            'subject_id' => $i,
            'semester_id' => 1,           
        	]);
        }
         for ($i=5; $i < 9; $i++) { 
        	 DB::table('courses')->insert([
            'subject_id' => $i,
            'semester_id' => 2,           
        	]);	
        }
         for ($i=9; $i < 14; $i++) { 
        	 DB::table('courses')->insert([
            'subject_id' => $i,
            'semester_id' => 3,           
        	]);
        }
        
      
    }
}
