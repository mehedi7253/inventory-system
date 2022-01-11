<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;
use Nette\Utils\Image;

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
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'phone' => 'required|unique:employees',
            'salary' => 'required',
            'address' => 'required',
            'nid' => 'required',
            'joinig_date' => 'required',
        ]);


        $employee = new employee();
        $employee->name        = $request->name;
        $employee->email       = $request->email;
        $employee->phone       = $request->phone;
        $employee->salary      = $request->salary;
        $employee->address     = $request->address;
        $employee->nid         = $request->nid;
        $employee->joinig_date = $request->joinig_date;
        $employee->save();


        if($request->photo)
        {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'backend/employee/';
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
            $employee->photo       = $image_url;
            $employee->save();
        }else{
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
        //
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
        //
    }
}
