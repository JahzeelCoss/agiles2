<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name', 'email','password', 'gender', 'born_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function Company(){
        return $this->hasOne('App\Company');
    }

    public function Notifications(){
        return $this->hasMany('App\Notification');
    }

    public function Roles(){
        return $this->belongsToMany('App\Role');
    }

    public function Races(){
        return $this->belongsToMany('App\Race');
    }

    public function IsOnRace($raceId){       
        $isOnRace = false;
        //$user = $this->races->where('race_id','=', $raceId)->where('user_id','=',$this->id)->first();
        
        $races = $this->races->find($raceId);      

        // if($race){
        //     return (string)$race;
        // }
        // else{
        //     return (string)$race;
        // }

        if (is_null($races)) {
           $isOnRace = false;
        }else{
            $isOnRace = true;
        }                  
        return $isOnRace;
    }

    // public function Category(){
    //     return $this->belongsTo('App\Category');
    // }
    // public function Type(){
    //     return $this->belongsTo('App\Type');
    // }
}
