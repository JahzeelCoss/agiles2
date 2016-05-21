<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Elegant

{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'races';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description', 'image', 'contact_info', 'distance', 'fee', 'capacity', 'start_place','finish_place', 'race_date', 'category_id', 'type_id'];
    //faltan el tipo y la categoría

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',        
        'description' => 'required',       
        'distance'=> 'required|numeric',        
        'fee' => 'required|numeric',
        'capacity'=> 'required|numeric',        
        'start_place' => 'required',
        'finish_place'=> 'required',
        'race_date' => 'required',
        'category_id' => 'required',
        'type_id' => 'required',
    ];

    public function Company(){
    	return $this->belongsTo('App\Company');
    }
    public function Category(){
        return $this->belongsTo('App\Category');
    }
    public function Type(){
        return $this->belongsTo('App\Type');
    }
    public function Users(){
        return $this->belongsToMany('App\User');
    }

    public function getRacesByCategory($raceCategory){
        $CategoryRaces = Races::where('category_id','=',$raceCategory)->get();
    }
}
