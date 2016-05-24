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
    	return $this->belongsTo('App\User');
    }

    public function Races(){
        return $this->hasMany('App\Race');
    }

    public function Sponsors(){
        return $this->hasMany('App\Sponsor');
    }

    //************************
    // notar los parentesis cuando se usa una invocacion de relacion, e spor que se usa un uqerybuilder despues como el where    
    //***********************
    public function OpenRaces(){
       
        $openRaces = $this->races()->where('active','=','1')->get();
     //   var_dump($openRaces);
        //return $this->races()->where('name','=','race1')->get();
        return $openRaces;
    }

    public function ClosedRaces(){
        $closedRaces = $this->races()->where('active','=','0')->get();
        return $closedRaces;
    }
    
    public function UsersOfMyRaces(){
        $races = $this->ClosedRaces();
        $usersOfMyRaces = collect();
        //$users = collect();
        if($races){//si tiene carreras terminadas            
            foreach ($races as $race) {
                $users = $race->users;
                if($users->count()){
                    if($usersOfMyRaces->count()){

                    }else{
                        $usersOfMyRaces->merge($users);
                    }
                    $users = $users->filter(function($race){
                        if($usersOfMyRaces->contains($user)){
                            return true;
                        }
                    });

                }
            }
        } 
        return $usersOfMyRaces;       
    }
}
