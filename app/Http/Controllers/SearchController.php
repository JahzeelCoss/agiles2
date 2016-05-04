<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Race;
use Auth;
use Entrust;

class SearchController extends Controller
{
  
    public function getPage()
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
    		$races = $user->company->races()->where("name","=",$raceName)->get(); 
            $data['isTheUser'] = true;
            // return $races;
    	}else{
    		//$races = Race::all()->where("name","=",$raceName)->get();	
            $races = Race::where("name","=",$raceName)->get();            
    	}
       // return $races;
       $data['races'] = $races;

        return view('searches.searchRace')->with('data', $data);
    }

}
