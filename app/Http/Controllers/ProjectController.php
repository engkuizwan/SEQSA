<?php

namespace App\Http\Controllers;
use App\Models\M_project;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d['title'] = 'PROJECT LIST';
        $d['model']  = M_project::all();
        // dd($d);
       return view('project.index',$d);
    }

    public function read(){
        
        $data['model'] = M_project::all();
        // dd($data);
        return view('project.senarai', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('project.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die();
  
        $validate = $request->validate([
            'project_name' => 'required',
            'project_framework' => 'required',
            'project_description' => 'required'
        ],[
            'project_name.required' => 'Please enter project name',
            'project_framework.required' => 'Please enter project framework',
            'project_description.required' => 'Please enter project description'
        ]);
        try {

            M_project::create($validate);
            return redirect(route('newproject.index'))->withSuccess('Data successfully inserted');
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
        // dd($id);
        $d['project'] = M_project::find($id);
        // $d['student2'] = Student::where(['student_religion'=> 'ISLAM'])->first();
        // $d['gender'] = BankStatusHelper::getGender();
        // dd($d);

        return view('project.edit',$d);
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
        // dd($request);
        $validate = $request->validate([
            'project_name' => 'required',
            'project_framework' => 'required',
            'project_description' => 'required'
        ],[
            'project_name.required' => 'Please enter project name',
            'project_framework.required' => 'Please enter project framework',
            'project_description.required' => 'Please enter project description'
        ]);
        try {
            $data= M_project::findOrFail($id);
            $data->project_name= $request->project_name;
            $data->project_framework= $request->project_framework;
            $data->project_description = $request->project_description;
            $data->save();
            // $project->update($validate);
            return redirect(route('newproject.index'))->withSuccess('Data successfully updated');
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
    public function destroy($id)
    {
        //
        // dd($id);
        try{

            M_project::destroy($id);
            return redirect(route('newproject.index'))->withSuccess('Berjaya Kemaskini');

        }catch(\Throwable $th){

        }
    }
}
