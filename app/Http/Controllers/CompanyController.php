<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Company;
use App\Notification;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view('companies.coe')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_company = new Company();
        $new_notification = new Notification();
        if($new_company->validate($request->all(), Company::$rules)){
            $new_company = new Company( $request->except(['_token']));   
            $new_company->user_id = Auth::user()->id;   
            $new_company->save();
            $new_notification->company_id = $new_company->id;
            $new_notification->save();
            //$companies = Company::all();
            //return View::make($tatus);
            return Redirect::to('index');        
        }else{
            $errors = $new_company->errors();
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
        $company = Company::find($id);
        $data['company'] = $company;
        return view('companies.show')->with('data',$data);
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
        $company = Company::find($id);          
        $company->delete();
        $notification = Notification::where('company_id','=', $id);          
        $notification->delete();  
        return Redirect::to('notifications');
    }

    public function activate($id)
    {
        $company = Company::find($id);
        $company->active = true;
        $company->update();

        $notification = Notification::where('company_id','=', $id);          
        $notification->delete(); 
        return Redirect::to('notifications');
    }
}
