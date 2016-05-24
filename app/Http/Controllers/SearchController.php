<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Race;
use App\Company;
use App\Role;
use App\User;
use Auth;
use Entrust;
use Redirect;

class SearchController extends Controller
{
  
    public function getRacesPage()
    {    	
        return view('searches.searchRace');
    }

    public function searchRace(Request $request)
    {	
    	$races = null;
        //return $request->input('name');
        $raceName = $request->input('name');
        $data = null;
        $data['isTheUser'] = false;
        //return $raceName;
    	if(Entrust::hasRole('representative')){
    		$user = Auth::user();            
    		$races = $user->company->races()->where("name","LIKE",'%'.$raceName.'%')->get(); 
            $data['isTheUser'] = true;
            // return $races;
    	}else{
    		//$races = Race::all()->where("name","=",$raceName)->get();	
            $races = Race::where("name","LIKE",'%'.$raceName.'%')->get();            
    	}
       // return $races;
       $data['races'] = $races;

        return view('searches.searchRace')->with('data', $data);
    }


    public function getCompaniesPage()
    {       
        if(Entrust::hasRole('admin')){
            return view('searches.searchCompany');
        }else{
            return Redirect::to('index');
        }        
    }

    public function searchCompany(Request $request)
    {   
        $companies = null;
        //return $request->input('name');
        $companyName = $request->input('name');
        $data = null;       
                
        $companies = Company::where("name","LIKE",'%'.$companyName.'%')->get();                    
        $data['companies'] = $companies;

        return view('searches.searchCompany')->with('data', $data);
    }

    public function getRunnersPage()
    {       
        if(Entrust::hasRole('admin')){
            return view('searches.searchRunner');
        }else{
            return Redirect::to('index');
        }        
    }

    public function searchRunner(Request $request)
    {   
        $runners = null;
        //return $request->input('name');
        $runnerName = $request->input('name');
        //$data = null;       
        $users = Role::where('name', 'runner')->first()->users()->get();     
        $runners = User::where("first_name","LIKE",'%'.$runnerName.'%')->get();
        //return $runners->count();
        $runners2 = $runners->diff($users); 
        //return $runners2->count();    
        $runners = $users->diff($runners2);             
        //return $runners->count();      
        //$data['runners'] = $runners;

        return view('searches.searchRunner')->with('runners', $runners);
    }

    public function getRepresentativesPage()
    {       
        if(Entrust::hasRole('admin')){
            return view('searches.searchRepresentative');
        }else{
            return Redirect::to('index');
        }        
    }

    public function searchRepresentative(Request $request)
    {   
        $runnerName = $request->input('name');
        //$data = null;       
        $users = Role::where('name', 'representative')->first()->users()->get();     
        $representatives = User::where("first_name","LIKE",'%'.$runnerName.'%')->get();
        //return $representatives->count();
        $representatives2 = $representatives->diff($users); 
        //return $representatives2->count();    
        $representatives = $users->diff($representatives2);             
        //return $representatives->count();      
        //$data['representatives'] = $representatives;        
        return view('searches.searchRepresentative')->with('representatives', $representatives);
    }
}
