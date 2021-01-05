<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResource;
use App\Employee;
use App\Http\Requests;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::all();
        return EmployeeResource::collection($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employee;
        $emp->salary = $request->input('salary');
        $emp->emp_name = $request->input('emp_name');
        $emp->job_description = $request->input('job');
        $emp->save();
        return new EmployeeResource($emp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Employee::find($id);
        if($article){
            return new EmployeeResource($article);
        }
        return"Employee Not Found";
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
        $emp = Employee::find($id);
        $emp-> salary = $request->input('salary');
        $emp-> emp_name = $request->input('emp_name');
        $emp-> job_description = $request->input('job');
        $emp-> save();
        return new EmployeeResource();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::findOrfail($id);
        if($emp->delete()){
            return new EmployeeResource($emp);
        }
        return "Error while deleting";
    }
}
