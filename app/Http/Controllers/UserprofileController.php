<?php

namespace App\Http\Controllers;

use App\Models\assetlookup;
use App\Models\userprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userProfile) //muka depan
    {
        //
        $data['user_profile'] = userprofile::find($userProfile);
        return view('userprofile.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //add
    {
        //
        // $data['disabled'] = " ";
        $data['type_file'] = assetlookup::where(['category'=>'type of file'])->get();
         return view('userprofile.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// add action
    {
        //dd("ayam");
        //
        $validate = $request->validate([
            'name'=>'required',
            'user_role'=>'required',
            'user_email'=>'required',
            'user_name'=>'required',
            'user_password'=>'required',
        ],[
            'name.required'=>'required',
            'user_role.required'=>'required',
            'user_email.required'=>'required',
            'user_name.required'=>'required',
            'user_password.required'=>'required',
        ]);

        try{
            //userprofile::create($validate);
            userprofile::create([
                'name'=> $request->name,
                'user_role'=>$request->user_role,
                'user_email'=>$request->user_email,
                'user_name'=>$request->user_name,
                'user_password'=> Hash::make($request->user_password),
            ]);
            return redirect(route('login'))->withSuccess('Berjaya dikemaskini');
        }catch(\Throwable $th){
            return back()->withError('Something when wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function show(userprofile $userprofile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function edit(userprofile $userprofile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userprofile $userprofile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(userprofile $userprofile)
    {
        //
    }
}
