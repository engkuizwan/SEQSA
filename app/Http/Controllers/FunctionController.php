<?php

namespace App\Http\Controllers;

use App\Models\M_Function;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fileid="")
    {
        $d['file_id'] = $file_id = decrypt($fileid);
        $d['title'] = "Function";
        $d['functionList'] = M_Function::filter($file_id)->get(); 

        return view('function.senarai', $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('function.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'func_name'=>'required',
            'user'=>'required',
            'role'=>'required',
            'file'=>'nullable',
            //'user_password'=>'required',
        ],[
            'func_name.required'=>' Function Name is required',
            'user.required'=>'User Name is required',
            'role.required'=>'Role is required',
            // 'file.required'=>'required',
            //'user_password.required'=>'required',
        ]);

        try{
            $file_id = $request->file;
            $data=[
                'function_name' => $request->func_name,
                'userID'=>$request->user,
                'roleID'=>$request->role,
                'file_ID'=>$request->user_name,
                //'user_password'=> Hash::make($request->user_password),
            ];
            $sql = M_Function::insert($data);
            return redirect(route('functionindex', encrypt($file_id)))->withSucces('Berjaya Kemaskini');
        }catch(\Throwable $th){
            return back()->withError('Something when wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Function  $function
     * @return \Illuminate\Http\Response
     */
    public function show( $function)
    {
        $d['funcDetail'] = M_Function::find($function);
        $d['disabled'] = "disabled";

        return view('function.detail', $d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Function  $function
     * @return \Illuminate\Http\Response
     */
    public function edit($function)
    {
        $d['funcDetail'] = M_Function::find($function);

        return view('function.edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Function  $function
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $function)
    {
        $validate = $request->validate([
            'func_name'=>'required',
            'user'=>'required',
            'role'=>'required',
            'file'=>'nullable',
            //'user_password'=>'required',
        ],[
            'func_name.required'=>' Function Name is required',
            'user.required'=>'User Name is required',
            'role.required'=>'Role is required',
            // 'file.required'=>'required',
            //'user_password.required'=>'required',
        ]);

        try{
            $file_id = $request->file;
            $data=[
                'function_name' => $request->func_name,
                'userID'=>$request->user,
                'roleID'=>$request->role,
                'file_ID'=>$request->file,
                //'user_password'=> Hash::make($request->user_password),
            ];
            $sql = M_Function::where('functionID',$function)->update($data);
            return redirect(route('functionindex', encrypt($file_id)))->withSucces('Berjaya Kemaskini');
        }catch(\Throwable $th){
            return back()->withError('Something when wrong!');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Function  $function
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_Function $function)
    {
        $file_id = $_POST['function_id'];
        try {
            $function->delete();
            return redirect(route('functionindex', encrypt($file_id)))->withSuccess('Berjaya Kemaskini');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
