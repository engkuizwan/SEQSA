<?php

namespace App\Http\Controllers;

use App\Models\assetlookup;
use App\Models\File;
use App\Models\Flow;
use App\Models\Modul;
use Illuminate\Http\Request;

class FlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($emodul_id)
    {
        $d['modul_id'] = decrypt($emodul_id);
        // dd($d['modul_id']);

        return view('flow.index',$d);
    }

    public function read($modul_id){

        $d['flow'] = Flow::filter($modul_id)->get();
        $d['modul_id'] = $modul_id;
        
        $project_id = Modul::where('modul_id', $modul_id)->get();
        // dd($project_id[0]->project_id);
        $d['file'] = File::where('projectID',$project_id[0]->project_id)->get();
        // dd($d['file']);

        // $list= json_decode($d['flow'][1]->all_id);
        $l = array(
            0 => array(
                'id' => 2,
                'type' => 'function'
            ),
            1 => array(
                'id' => 1,
                'type' => 'file'
            ),
            2 => array(
                'id' => 2,
                'type' => 'file'
            ),
        );
        // dd(json_encode($l));
        // $d['list'] = $list;
        // dd($d);  

        return view('flow.list',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($modul_id)
    {
        // dd($modul_id);
        $modul = Modul::where('modul_id', $modul_id)->get();
        $project_id = $modul[0]->project_id;
        // dd($project_id[0]->project_id);
        $d['modul_id'] = $modul_id;
        $d['all_file'] = File::where('projectID',$project_id)->get();
        $d['type_file'] = assetlookup::where(['category'=>'type of file'])->get();
        $d['controller'] = File::where(['file_type'=>'controller', 'projectID'=>$project_id])->get();
        $d['view'] = File::where(['file_type'=>'view', 'projectID'=>$project_id])->get();
        $d['model'] = File::where(['file_type'=>'model', 'projectID'=>$project_id])->get();
        $d['helper'] = File::where(['file_type'=>'helper', 'projectID'=>$project_id])->get();
        // dd($t);
        return view('flow.form', $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file_name);
        $all_id = array();
        foreach ($request->file_name as $item) {
           $file = explode(':',$item);
           if($file[0] == 'file'){
            $all_id[] = array('type' => 'file', 'id' => $file[1]);
           }elseif ($file[0] == 'function') {
            $all_id[] = array('type' => 'function', 'id' => $file[1]);
           }
        }

        $all_idj = json_encode($all_id);
        // dd($all_id);
        Flow::insert([
            'flow_name' => $request->flow_name,
            'flow_description' => $request->flow_description,
            'all_id' => $all_idj,
            'modul_id' => $request->modul_id
        ]);

        $d['modul_id'] = $request->modul_id;

        return redirect(route('flowindex', encrypt($request->modul_id)))->withSuccess('Data successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $d['show'] = 1;
        $d['flow'] = $flow = Flow::find($id);
        // dd($d['flow']);
        // dd(json_decode($d['flow']->all_id, true));k

        // foreach (json_decode($d['flow']->all_id, true) as $item) {
        //     dd($item['type']);
        // }

        $modul_id = $flow->modul_id;
        $modul = Modul::where('modul_id', $modul_id)->get();
        $project_id = $modul[0]->project_id;
        // dd($project_id[0]->project_id);
        $d['modul_id'] = $modul_id;
        $d['all_file'] = File::where('projectID',$project_id)->get();
        $d['type_file'] = assetlookup::where(['category'=>'type of file'])->get();
        $d['controller'] = File::where(['file_type'=>'controller', 'projectID'=>$project_id])->get();
        $d['view'] = File::where(['file_type'=>'view', 'projectID'=>$project_id])->get();
        $d['model'] = File::where(['file_type'=>'model', 'projectID'=>$project_id])->get();
        $d['helper'] = File::where(['file_type'=>'helper', 'projectID'=>$project_id])->get();
        // dd($t);
        return view('flow.form', $d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // dd($id);
         $d['edit'] = 1;
         $d['flow'] = $flow = Flow::find($id);
         // dd($flow->modul_id);
         $modul_id = $flow->modul_id;
         $modul = Modul::where('modul_id', $modul_id)->get();
         $project_id = $modul[0]->project_id;
         // dd($project_id[0]->project_id);
         $d['modul_id'] = $modul_id;
         $d['all_file'] = File::where('projectID',$project_id)->get();
         $d['type_file'] = assetlookup::where(['category'=>'type of file'])->get();
         $d['controller'] = File::where(['file_type'=>'controller', 'projectID'=>$project_id])->get();
         $d['view'] = File::where(['file_type'=>'view', 'projectID'=>$project_id])->get();
         $d['model'] = File::where(['file_type'=>'model', 'projectID'=>$project_id])->get();
         $d['helper'] = File::where(['file_type'=>'helper', 'projectID'=>$project_id])->get();
         // dd($t);
         return view('flow.form', $d);
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
    public function destroy(Request $request,$id)
    {
        // dd($request->all());
        try{

            Flow::destroy($id);
            return redirect(route('flow_senarai',$request->modul_id))->withSuccess('Berjaya Kemaskini');

        }catch(\Throwable $th){

        }
    }
}
