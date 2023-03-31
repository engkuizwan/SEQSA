<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projectId)
    {
        $d['project_id']=$projectId = decrypt($projectId);
        $d['title'] = "Modul & File";
        $d['modul'] =  Modul::filter($projectId)->get();
        $d['file'] = File::filter($projectId)->get();
        // dd($d['file']);
        
        return view('modul.senarai',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modul.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'modul_name' => 'required',
        //     'project_framework' => 'required',
        //     'project_description' => 'required'
        // ],[
        //     'project_name.required' => 'Please enter project name',
        //     'project_framework.required' => 'Please enter project framework',
        //     'project_description.required' => 'Please enter project description'
        // ]);
        // dd($request->project_id);
        $modul = new Modul;
        try {

            // $modul->modul_name = $request->modul_name;
            // $modul->project_id = $request->project_id;
            // $modul->save();

            Modul::create([
                'modul_name' => $request->modul_name,
                'project_id' => $request->project_id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $d['modul'] = modul::find($id);
        $d['show'] = 1;

        return view('modul.form',$d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d['modul'] = modul::find($id);
        $d['edit'] = 1;

        return view('modul.form',$d);
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
        try {
            $modul = Modul::find($id);
            $modul->modul_name = $request->modul_name;
            $modul->save();
            return redirect(route('modulindex', encrypt($modul->project_id)))->withSuccess('Data successfully inserted');
        } catch (\Throwable $th) {

            dd($th);
            return back()->withError('Something when wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $projectId = $request->input('project_id');
        try{

            // File::destroy($id);
            Modul::where('modul_id','=',$id)->delete();
            return redirect(route('moduleindex',$projectId))->withSuccess('Berjaya Kemaskini');

        }catch(\Throwable $th){

        }
    }
}
