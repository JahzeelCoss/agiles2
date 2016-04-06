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
            $data['company'] = $company;
            $data['races'] = $races;
            return view('races.index')->with('data',$data);
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

            if ($request->HasFile('image'))
            {

                // $img_path = 'uploads/races';
                // //  Before uploading a new image we will check if one already exists and delete it first.
                // if ($new_race->image != null)
                // {
                //     $old_image = $new_race->image;
                //     unlink(sprintf(public_path() . $img_path . '%s', $old_image));
                // }

                // //  Next we will get the image to be uploaded, rename it so as to be unique, save and then alter as required.            

                // $file = Request::file('image');                            
                // $image_name = time() . '-' . $file->getClientOriginalName();
                // $file->move(public_path() . $img_path, $image_name);
                // $image_alter = Image::make(sprintf(public_path() . $img_path . '%s', $image_name))->resize(75, 75)->save();

                $destinationPath = 'uploads/races'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Session::flash('success', 'Upload successfully'); 
                //return Redirect::to('upload'); 

                $new_race->image = $fileName; // Note we add the image path to the databse field before the save.

            }

            $new_race->save();
            //$races = Race::all();
            $company = Auth::User()->Company;
            $races = $company->Races; 
            $data['company'] = $company;
            $data['races'] = $races;
            return view('races.index')->with('data',$data);            
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
        return view('races.show')->with('race', $race);
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
            if ($request->HasFile('image'))
            {           

                $destinationPath = 'uploads/races'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                
                //$race->image = $fileName; // Note we add the image path to the databse field before the save.
            }else{
                $fileName = $race->image;
            }
            $race->update($request->except(['_token'])); 
            $race->image = $fileName;
            $race->save();           
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
