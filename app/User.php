<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Collection;

use App\Race;

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

    protected $ableToParticipate = 0;

    public function Company(){
        return $this->hasOne('App\Company');
    }

    // public function NotificationsCount(){
    //     //return $this->hasMany('App\Notification');
    //     return Notification::all()->count();
    // }

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
    //1.-infantil
    //2.-hombres
    //3.-Mujeres
    //4.sin restriccion
    //5.-Adulto mayor
    public function IsAbleToParticipate($raceCategory)
    {
        $isAbleToParticipate = false;
        if($raceCategory == 4){
            $isAbleToParticipate = true;
        }else{
            $age = $this->getAge();            
            if($age < 13  && $age > 4){
                if($raceCategory == 1){
                    $isAbleToParticipate = true;
                }
            }else{
                if($age > 4){
                    if($age > 59){
                        if($raceCategory == 5){
                            $isAbleToParticipate = true;
                        }       
                    }else{
                        if($raceCategory == 2 && $this->gender){
                            $isAbleToParticipate = true;
                        }else{
                            if($raceCategory == 3 && !$this->gender){
                                $isAbleToParticipate = true;
                            }
                        }                        
                    }
                }
            }
        }
        return $isAbleToParticipate;   
    }

    public function getAge(){
        $age = 22;
        return $age;
    }

    public function getRecommenderRaces(){
        $races = null;
        $favoriteCategory = $this->getFavoriteCategory();
        if($favoriteCategory == null){
            ;
        }else{
            $races = Race::getRacesByCategory($favoriteCategory());
            $myRaces = $this->getMyRacesByCategory($favoriteCategory);
            $recommended = $races->reject(function ($item) {
                return $item->contains();
            }); 


            $races;
        }

    }

    public function setAbleToParticipate(){
        global $ableToParticipate;
        $ableToParticipate = collect(0);
        if($ableToParticipate == null || $ableToParticipate->contains(0)){
           if($this->IsAbleToParticipate(1)){
                $ableToParticipate->push(1);  
            }
            if($this->IsAbleToParticipate(2)){
                $ableToParticipate->push(2);    
            }
            if($this->IsAbleToParticipate(3)){
                $ableToParticipate->push(3); 
            }
            if($this->IsAbleToParticipate(4)){
                $ableToParticipate->push(4);   
            }
            if($this->IsAbleToParticipate(5)){
                $ableToParticipate->push(5);
            }
            $ableToParticipate->forget(0); 
        }       
       
    }

    public function getFavoriteCategory(){
        global $ableToParticipate;
        $category = null;
        $myRaces = $this->races;
        //$category = $myRaces->groupBy('category_id')->orderBy('COUNT(category_id)', 'desc')->value('category_id')->get();
        //
        //funciona
        //$category = Race::groupBy('category_id')->orderBy('category_id', 'asc')->havingRaw('COUNT(category_id)')->value('category_id');
        
        if($myRaces){
            $collection = null;
            $infantil = 0;
            $hombres = 0;
            $mujeres = 0;
            $sinRestriccion = 0;
            $adultoMayor = 0;

            if($ableToParticipate->contains(1)){
                $infantil = $myRaces->where('category_id',1)->count();
            }
            if($ableToParticipate->contains(2)){
                $hombres = $myRaces->where('category_id',2)->count();   
            }
            if($ableToParticipate->contains(3)){
                $mujeres = $myRaces->where('category_id',3)->count();
            }
            if($ableToParticipate->contains(4)){
                $sinRestriccion = $myRaces->where('category_id',4)->count();
            }
            if($ableToParticipate->contains(5)){
                $adultoMayor = $myRaces->where('category_id',5)->count();
            }

            $collection = collect([$infantil, $hombres, $mujeres, $sinRestriccion, $adultoMayor]);
            //var_dump($collection);
            $maxima = $collection->max();
            $favoriteCategory = $collection->search($maxima) + 1;
        }
        //var_dump($ableToParticipate);
        //$category->first()->name
        return $favoriteCategory;
        //return $myRaces;
    }

    public function getMyRacesByCategory($raceCategory){
        return $this->races()->where('category_id','=',$raceCategory)->get();
    }

    // public function Category(){
    //     return $this->belongsTo('App\Category');
    // }
    // public function Type(){
    //     return $this->belongsTo('App\Type');
    // }
}
