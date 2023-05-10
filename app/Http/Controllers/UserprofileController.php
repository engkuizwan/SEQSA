<?php

namespace App\Http\Controllers;

use App\Models\assetlookup;
use App\Models\userDetail;
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
    public function index() //muka depan
    {
        //
        $data['user_detail'] = userDetail::find(1);//hardcode
        $data['user_role'] = assetlookup::where(['category'=>'user role'])->get();
        $data['disabled'] = "disabled";
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
        $data['user_role'] = assetlookup::where(['category'=>'user role'])->get();
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
            return redirect(route('index'))->withSuccess('Berjaya dikemaskini');
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
    public function edit( $userprofile)
    {
        //
        $data['user_detail'] = userDetail::find($userprofile);
        //$data['disabled'] = " ";
        $data['user_role'] = assetlookup::where(['category'=>'user role'])->get();
        return view('userprofile.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userprofile  $userprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userprofile)
    {
        //
        //dd("masuk");
        $validate = $request->validate([
            'name'=>'required',
            'user_role'=>'required',
            'user_email'=>'required',
            'user_name'=>'required',
            //'user_password'=>'required',
        ],[
            'name.required'=>' Name is required',
            'user_role.required'=>'required',
            'user_email.required'=>'required',
            'user_name.required'=>'required',
            //'user_password.required'=>'required',
        ]);

        try{
            //$userDetail->update($validate);
            $data=[
                'name' => $request->name,
                'user_role'=>$request->user_role,
                'user_email'=>$request->user_email,
                'user_name'=>$request->user_name,
                //'user_password'=> Hash::make($request->user_password),
            ];
            userprofile::where('id',$userprofile)->update($data);
            return redirect(route('userprofile.index'))->withSucces('Berjaya Kemaskini');
        }catch(\Throwable $th){
            return back()->withError('Something when wrong!');
        }
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
