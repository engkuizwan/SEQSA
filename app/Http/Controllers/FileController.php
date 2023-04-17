<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\assetlookup;
use Illuminate\Http\Request;

class FileController extends Controller
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
        //
        $d['type_file'] = assetlookup::where(['category'=>'type of file'])->get();
        return view('file.form', $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $file = new File;
        // dd($request->all());
        try {

            // $file->file_name = $request->file_name;
            // $file->projectID = $request->project_id;
            // $file->save();
            File::create([
                'file_name' => $request->file_name,
                'file_type' => $request->file_type,
                'projectID' => $request->project_id 
            ]);
            return redirect(route('modulindex', encrypt($request->project_id)))->withSuccess('Data successfully inserted');
        } catch (\Throwable $th) {

            dd($th);
            return back()->withError('Something when wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d['file'] = File::find($id);
        $d['show'] = 1;

        return view('file.form',$d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d['file'] = File::find($id);
        $d['edit'] = 1;

        return view('file.form',$d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $file = File::find($id);
            $file->file_name = $request->file_name;
            $file->save();
            return redirect(route('modulindex', encrypt($file->projectID)))->withSuccess('Data successfully inserted');
        } catch (\Throwable $th) {

            dd($th);
            return back()->withError('Something when wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $projectId = $request->input('project_id');
        // dd($id);
        try{

            // File::destroy($id);
            File::where('file_ID','=',$id)->delete();
            return redirect(route('moduleindex',$projectId))->withSuccess('Berjaya Kemaskini');

        }catch(\Throwable $th){

        }
    }
}
