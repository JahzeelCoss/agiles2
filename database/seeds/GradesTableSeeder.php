<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    //SOLO PRIMER SEMESTRE
        for ($i=1; $i < 501; $i++) { 
            //algebra superior 1 71%
            $a = rand(0,100);
            if($a <= 71){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 1,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //calculo 1 73%
            $a = rand(0,100);
            if($a <= 73){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 2,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //computacion 1 100% 
            $a = rand(0,100);
            if($a <= 95){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 3,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //geometria analitica 71%
            $a = rand(0,100);
            if($a <= 71){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 4,
            'student_id' => $i,  
            'pass' => $v,         
            ]);            
        }
    //HASTA SEGUNDO SEMESTRE
        for ($i=1; $i < 401; $i++) {             
            //algebra superior 2 50%
            $a = rand(0,100);
            if($a <= 50){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 5,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //calculo 2 65%
            $a = rand(0,100);
            if($a <= 65){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 6,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //computacion 2 91%
            $a = rand(0,100);
            if($a <= 91){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 7,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //geometria moderna 91%
            $a = rand(0,100);
            if($a <= 91){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 8,
            'student_id' => $i,  
            'pass' => $v,         
            ]);            
        }
    //HASTA TERCER SEMESTRE
        for ($i=1; $i < 301; $i++) {            
            //algebra lineal 1 63%
            $a = rand(0,100);
            if($a <= 63){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 9,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //calculo 3 73%
            $a = rand(0,100);
            if($a <= 73){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 10,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //analisis numerico 81%
            $a = rand(0,100);
            if($a <= 81){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 11,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //ecuaciones diferenciales 20%
            $a = rand(0,100);
            if($a <= 20){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 12,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //probabilidad 33%
            $a = rand(0,100);
            if($a <= 33){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 13,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
        }
    //HASTA CUARTO SEMESTRE
    	for ($i=1; $i < 201; $i++) { 
            //LINEAL 2 64%
            $a = rand(0,100);
            if($a <= 64){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 14,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //ANALISIS NUMERICO 2 63%
            $a = rand(0,100);
            if($a <= 63){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 15,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //ECUACIONES DIFERENCIALES 65%
            $a = rand(0,100);
            if($a <= 65){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 16,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
            //INFERENCIA ESTADISTICA 33%
            $a = rand(0,100);
            if($a <= 33){
                $v = true;
            }else{
                $v = false;
            }
            DB::table('grades')->insert([
            'course_id' => 17,
            'student_id' => $i,  
            'pass' => $v,         
            ]);
        }
       

    }
}
