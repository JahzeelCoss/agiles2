<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Sponsor;
use Auth;
use Entrust;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Entrust::hasRole('admin')) {
            $sponsors = Sponsor::all();  
            return view('sponsors.all')->with('sponsors',$sponsors);
        }elseif (Entrust::hasRole('representative')) {
            $company = Auth::User()->Company;
            $sponsors = $company->sponsors; 
            $data['company'] = $company;
            $data['sponsors'] = $sponsors;
            return view('sponsors.index')->with('data',$data);
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
        return view('sponsors.coe')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_sponsor = new Sponsor();
        $current_user = Auth::user();
        if($new_sponsor->validate($request->all(), Sponsor::$rules)){
            $new_sponsor = new Sponsor( $request->except(['_token']));   
            $new_sponsor->company_id = $current_user->Company->id;

            if ($request->HasFile('image'))
            {

                $destinationPath = 'uploads/sponsors'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                $new_sponsor->image = $fileName; // Note we add the image path to the databse field before the save.

            }

            $new_sponsor->save();
            //$Sponsors = Sponsor::all();
            $company = Auth::User()->Company;
            $sponsors = $company->sponsors; 
            $data['company'] = $company;
            $data['sponsors'] = $sponsors;
            return view('sponsors.index')->with('data',$data);            
        }else{
            $errors = $new_sponsor->errors();
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
        $sponsor = Sponsor::find($id);
        return view('sponsors.show')->with('sponsor', $sponsor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        $data['sponsor'] = $sponsor;
        return view('sponsors.coe')
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
        $sponsor = Sponsor::find($id);        
        if($sponsor->validate($request->all(), Sponsor::$rules)){
            if ($request->HasFile('image'))
            {           

                $destinationPath = 'uploads/sponsors'; // upload path
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                
                //$sponsor->image = $fileName; // Note we add the image path to the databse field before the save.
            }else{
                $fileName = $sponsor->image;
            }
            $sponsor->update($request->except(['_token'])); 
            $sponsor->image = $fileName;
            $sponsor->save();           
            return Redirect::to('sponsors/'.$sponsor->id);            
        }else{
            $errors = $sponsor->errors();
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
        $sponsor = Sponsor::find($id);          
        $sponsor->delete();  
    }
}
