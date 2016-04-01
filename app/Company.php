<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Elegant
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','address', 'email', 'contact_info', 'profile_image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',        
        'address' => 'required',
        'email' => 'required|email|unique:users,email',
        'contact_info' => 'required',
    ];

    public function User(){
    	return $this->belongsTo('App/User');
    }
}
