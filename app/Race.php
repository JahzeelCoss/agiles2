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
    protected $fillable = ['name','description', 'image', 'contact_info', 'distance', 'fee', 'capacity', 'start_place','finish_place'];
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
    ];

    public function Company(){
    	return $this->belongsTo('App/Company');
    }
}
