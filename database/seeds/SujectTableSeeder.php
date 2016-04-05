<?php

use Illuminate\Database\Seeder;

class SujectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	 	DB::table('sujects')->insert([
	        'name' => 'Algebra Superior 1',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Calculo 1',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Computacion 1',	        
	    ]);         
	    DB::table('sujects')->insert([
	        'name' => 'Geometria Analitica',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Algebra Superior 2',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Calculo 2',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Computacion 2',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Geometria Moderna',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Álgebra Lineal I',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Cálculo III',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Análisis Numérico I',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Ecs. Diferenciales I',	        
	    ]); 
	    DB::table('sujects')->insert([
	        'name' => 'Probabilidad',	        
	    ]); 	   
    }
}
