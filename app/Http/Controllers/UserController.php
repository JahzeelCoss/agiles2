<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use Illuminate\Support\Facades\Validator;
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
             return view('users.all')->with('users',$users);
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
        // $user = Auth::User();        
        // if(Entrust::hasRole('admin'))
        // {
        //     //do something
        // }elseif (Entrust::hasRole('representative')) {            
        //     return view('representatives.index')->with('user', $user);
        // }else{
        //     return view('users.index');//o puedo rediccionarlo al index? y que luego vaya a lapagina de carreras recomendadas?
        // }
        $user = Auth::User();
        $data['user'] = $user;
        $data['isTheUser'] = false;     
        if (Auth::user()==$user) {
            $data['isTheUser'] = true;  
        }
        if($user->hasRole('representative')){
            $data['openRaces'] = $user->company->OpenRaces();
            $data['closedRaces'] = $user->company->ClosedRaces();
            //return $user->company->OpenRaces();
            return view('representatives.show')->with('data', $data);
        }
         if($user->hasRole('runner')){
            return view('runners.show')->with('data', $data);
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
         // get the user
        $user = user::find($id);
        if(Auth::User()->id == $id){
            if($user->hasRole('representative')){
            return view('representatives.edit')->with('user', $user);
            }
            if($user->hasRole('runner')){
                return view('runners.edit')->with('user', $user);
            }            
        }else{
            return Redirect::to('index');  
        }        
           
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
       $user = user::find($id);     

        if (empty(Input::get('password'))) {//si no escribió una contraseña

            $validator = Validator::make($request->all(), [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required|email|unique:users,email,'.$id,                       
            ]);

            if ($validator->fails()) {
                $errors = $user->errors();
                    return redirect()->back()->withInput()->withErrors($errors);
            }else{
                if ($request->HasFile('profile_image'))
                {  
                    $destinationPath = 'uploads/users'; // upload path
                    $extension = $request->file('profile_image')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111,99999).'.'.$extension; // renameing image
                    $request->file('profile_image')->move($destinationPath, $fileName); // uploading file to given path
                                       
                }else{
                    $fileName = $user->image;
                }
                $user->update($request->except(['_token','password'])); 
                $user->profile_image = $fileName;                                        
                $user->save();
                // redirect             
                return Redirect::to('index');               
            }

            
        }else{//si escribió una contraseña


            $validator = Validator::make($request->all(), [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|confirmed|min:5',  
            ]);

            if ($validator->fails()) {
                $errors = $user->errors();
                    return redirect()->back()->withInput()->withErrors($errors);
            }else{
                 if ($request->HasFile('profile_image'))
                {  
                    $destinationPath = 'uploads/users'; // upload path
                    $extension = $request->file('profile_image')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111,99999).'.'.$extension; // renameing image
                    $request->file('profile_image')->move($destinationPath, $fileName); // uploading file to given path
                                       
                }else{
                    $fileName = $user->image;
                }
                $user->update($request->except(['_token','password'])); 
                $user->profile_image = $fileName;   
                $user->password  = bcrypt(Input::get('password'));                                       
                $user->save();
                // redirect             
                return Redirect::to('index');                   
            }
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
        $isRunner = false;
        $user = User::find($id); 
        if($user->hasRole('runner')){
            $isRunner = true;
        }         
        $user->delete(); 
        if(Entrust::hasRole('Runner')){
            return Redirect::to('index');
        }else{
            if($isRunner){
                return Redirect::to('users/allRunners');      
            }else{
                return Redirect::to('users/allRepresentatives');      
            }             
        }       
    }

    public function allRunners()
    {
        if(Entrust::hasRole('admin')){
             //$users = User::all();
             $users = Role::where('name', 'runner')->first()->users()->get();
             return view('runners.all')->with('users',$users);
        }
        else{
            return Redirect::to('index');
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
            return Redirect::to('index');
        }
    }
}
