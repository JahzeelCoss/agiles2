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
use Carbon\Carbon;
use DateTime;

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

    protected $ableToParticipate = null;

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

    //RECIBE UNA CATEGORIA E IDENTIFICA SI PUEDE INSCRIBIRSE
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
        //return $carbon = Carbon::instance(strtotime($this->born_date));
        $today = Carbon::today();
        // $fecha = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
        //return var_dump($fecha);
        //return $this->born_date;
        $born_date = Carbon::createFromFormat('Y-m-d', ''.$this->born_date);
        $age = $today->diffInYears($born_date);  
        $age = $born_date->diffInYears($today);     
        return $age;
    }

    public function getRecommendedRaces(){
        global $ableToParticipate;
        $races = null;
        $recommendedRaces = null;
        //$complementRaces = false;                
        if($ableToParticipate == null){
            $this->setAbleToParticipate();
        }
        $favoriteType = $this->getFavoriteType();
        $favoriteCategory = $this->getFavoriteCategory();
        $myRaces = $this->races;        
        if($myRaces->count()){//si tiene carreras siempre tendra un tipo "favorito" por lo tanto no es necesaria la comprobacion
            //echo "tiene carreras\n";
            $racesByType = Race::byType($favoriteType);
            $myRaces = $this->getMyRacesByType($favoriteType, 4);
            $racesByType = $racesByType->diff($myRaces);
            $racesByType = $racesByType->filter(function($race){
                if($race->active){
                    return true;
                }
            });
            //echo "carreras por tipo filtradas ".$racesByType->count()."\n";
            $times = $racesByType->count();
            for ($i=0; $i < $times; $i++) { 
                $race = $racesByType->pop();//obtiene una carrera
                //if($this->IsAbleToParticipate($race->category_id)){//si esta entre las categorias permitidas para el usuario
                    //echo "si esta entre sus categorias";
                if($this->IsRaceAvailableForUser($race)){//descarta en las que el usuario ya esta inscrito y por categorias
                    //echo "si se recomenda";
                    if($recommendedRaces == null){
                        $recommendedRaces = collect([$races]);
                    }else{
                        $recommendedRaces->push($race);
                    }                    
                }
                //}
            }                                        
            if($this->HasAtLeast($recommendedRaces, 4)){
                //echo "tiene al menos 4 recomendadas\n";
                return $recommendedRaces->take(4);
            }else{//si con el tipo favorito aun no tiene las X carreras recomendadas entonces completamos con las categorias  
                //echo "completa con categorias\n";
                $racesByCategory = Race::byCategory($favoriteCategory);
                $myRaces = $this->getMyRacesByCategory($favoriteCategory);
                $racesByCategory = $racesByCategory->diff($myRaces);
                $racesByCategory = $racesByCategory->diff($racesByType);
                $racesByCategory = $racesByCategory->filter(function($race){
                    if($race->active){
                        return true;
                    }
                });
                if ($recommendedRaces) {
                    $recommendedRaces->push($racesByCategory);
                }               
                if($this->HasAtLeast($recommendedRaces, 4)){
                    return $recommendedRaces->take(4);
                }
            }
            
        }
        //si llego aqui es por que aun no completa la X cantidad de carreras recomendadas 
        
        //var_dump($recommendedRaces);
        if($recommendedRaces){
            $toFill = 4 - $recommendedRaces->count();
            $recommendedRaces = $this->TakeAvailableRacesForUser($recommendedRaces, $toFill);
        }else{
            $recommendedRaces = $this->TakeAvailableRacesForUser($recommendedRaces, 4);
        }
        return $recommendedRaces;
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
        $favoriteCategory = null;
        //$category = $myRaces->groupBy('category_id')->orderBy('COUNT(category_id)', 'desc')->value('category_id')->get();
        //
        //funciona
        //$category = Race::groupBy('category_id')->orderBy('category_id', 'asc')->havingRaw('COUNT(category_id)')->value('category_id');
        
        if($myRaces->count()){
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

    public function getFavoriteType(){
        $type = null;
        $myRaces = $this->races;
        $favoriteType = null;
        if($myRaces->count()){
            $collection = null;
            $maraton = 0;
            $carrera = 0;
            
            $maraton = $myRaces->where('type_id',1)->count();
            $carrera = $myRaces->where('type_id',2)->count();
             $collection = collect([$maraton, $carrera]);
            //var_dump($collection);
            $maxima = $collection->max();
            $favoriteType = $collection->search($maxima) + 1;
        }
        return $favoriteType;
    }

    public function getMyRacesByCategory($raceCategory){
        //return $this->races()->where('category_id','=',$raceCategory)->take($toTake);
        return $this->races()->where('category_id','=',$raceCategory)->get();
    }

    public function getMyRacesByType($raceType, $toTake){
        return $this->races()->where('type_id','=',$raceType)->take($toTake);
    }

    public function TakeAvailableRacesForUser($availableRaces, $toTake){             
        $activeRaces = Race::activeOnes();        
        $times = $activeRaces->count();
        $currentRaces = 0;        
        //$availableRaces = null;
        if(!$availableRaces){
            $availableRaces = collect();
        }
        for ($j=0; $j < $times; $j++) {                         
            if($currentRaces == $toTake){//si ya tiene las necesarias
                break;
            }else{
                $race = $activeRaces->pop();//obtiene una carrera                
                if($this->IsAbleToParticipate($race->category_id)){//si esta entre las categorias permitidas para el usuario
                    //echo "si esta entre sus categorias: ".$i."\n";
                    if($this->IsRaceAvailableForUser($race)){//
                        $availableRaces->push($race);
                        $currentRaces++;
                    }
                }
            }            
        }
        //echo $availableRaces->count();
        return $availableRaces;
    }

    //verifica si la carrera de entrada no se encuentra entre las carreras del usuario y que si es de las categorias donde puede correr
    public function IsRaceAvailableForUser($race){
        $myRaces = $this->races;
        $isRaceAvailableForUser = false;
        if(!$myRaces->contains('id',$race->id)){
            $isRaceAvailableForUser = $this->IsAbleToParticipate($race->category_id);
        }
        return $isRaceAvailableForUser;
    }

    public function HasAtLeast($collection, $atLeast){
        $hasAtLeast = false;
        if($collection){
            if(!$collection->count() < $atLeast){
                $hasAtLeast = true;
            }
        }        
        return $hasAtLeast;
    }

    public function MyActiveRaces(){
        $races = $this->races->where('active',1);
        return $races;
    }

    public function MyDeactiveRaces(){
        $races = $this->races->where('active',0);
        return $races;
    }
    // public function Category(){
    //     return $this->belongsTo('App\Category');
    // }
    // public function Type(){
    //     return $this->belongsTo('App\Type');
    // }
}
