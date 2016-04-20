<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Entrust;
use App\Company;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Entrust::hasRole('admin')){
             $users = User::all();
             return view('races.all')->with('races',$races);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::User();        
        if(Entrust::hasRole('admin'))
        {
            //do something
        }elseif (Entrust::hasRole('representative')) {            
            return view('representatives.index')->with('user', $user);
        }else{
            return view('users.index');//o puedo rediccionarlo al index? y que luego vaya a lapagina de carreras recomendadas?
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allRunners()
    {
        if(Entrust::hasRole('admin')){
             //$users = User::all();
             $users = Role::where('name', 'runner')->first()->users()->get();
             return view('users.all')->with('users',$users);
        }
        else{
             return redirect('index');
        }
    }
 
    public function allRepresentatives()
    {
        if(Entrust::hasRole('admin')){
             //$users = User::all();
             $users = Role::where('name', 'representative')->first()->users()->get();
            
             return view('representatives.all')->with('users',$users);
        }
        else{
             return redirect('index');
        }
    }
}
