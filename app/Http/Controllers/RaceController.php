<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Race;
use Auth;
use Entrust;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
        if (Entrust::hasRole('admin')) {
            $races = Race::all();  
            return view('races.all')->with('races',$races);
        }elseif (Entrust::hasRole('representative')) {
            $company = Auth::User()->Company;
            $races = $company->Races;  
            return view('races.index')->with('races',$races);
        }else{
            return redirect('index');
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = null;
        return view('races.coe')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_race = new Race();
        $current_user = Auth::user();
        if($new_race->validate($request->all(), Race::$rules)){
            $new_race = new Race( $request->except(['_token']));   
            $new_race->company_id = $current_user->Company->id;   
            $new_race->save();
            $races = Race::all();           
            return view('races.index')->with('races',$races);            
        }else{
            $errors = $new_race->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $race = Race::find($id);
        return view('users.show')->with('race', $race);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $race = Race::find($id);
        $data['Race'] = $race;
        return view('races.coe')
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $race = Race::find($id);        
        if($race->validate($request->all(), Race::$rules)){
            $race->update($request->except(['_token']));            
            return Redirect::to('races/'.$race->id);            
        }else{
            $errors = $race->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $race = Race::find($id);          
        $race->delete();             
    }
}
