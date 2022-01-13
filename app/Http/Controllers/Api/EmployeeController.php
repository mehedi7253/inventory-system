<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::all();
        return response()->json($employees);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'joinig_date' => 'required',
        ]);



        if($request->photo){

            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = '/backend/employee/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $employee = new employee();
            $employee->name        = $request->name;
            $employee->email       = $request->email;
            $employee->phone       = $request->phone;
            $employee->salary      = $request->salary;
            $employee->address     = $request->address;
            $employee->nid         = $request->nid;
            $employee->joinig_date = $request->joinig_date;
            $employee->save();
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
        $employee = employee::find($id);
        return response()->json($employee);
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
        $employee = employee::find($id);
        $employee->name        = $request->name;
        $employee->email       = $request->email;
        $employee->phone       = $request->phone;
        $employee->salary      = $request->salary;
        $employee->address     = $request->address;
        $employee->nid         = $request->nid;
        $employee->joinig_date = $request->joinig_date;
        $employee->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
    }
}
