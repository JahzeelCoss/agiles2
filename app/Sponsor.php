<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Elegant
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sponsors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',       
        
    ];

    public function Company(){
    	return $this->belongsTo('App\Company');
    }

}
