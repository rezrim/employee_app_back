<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->name) {
            $employee = Employee::where('fullname', 'like', '%' .  $request->name . '%')->get();
        } else {
            $employee = Employee::all();
        }

        return $this->sendResponse($employee, 'Employee Berhasil Ditampilkan.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $employee = Employee::create($input);

        return $this->sendResponse($employee, 'Employee Berhasil Ditambahkan');
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
        $employee = Employee::find($id);

        return $this->sendResponse($employee, 'Employee Berhasil Ditampilkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $input = $request->all();

        $employee->fullname = $input['fullname'];
        $employee->email = $input['email'];
        $employee->mobile = $input['mobile'];
        $employee->city = $input['city'];
        $employee->gender = $input['gender'];
        $employee->department = $input['department'];
        $employee->hire_date = $input['hire_date'];
        $employee->permanent = $input['permanent'];
        $employee->save();

        return $this->sendResponse($employee, 'Employee Berhasil Diupdate');
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
        $employee = Employee::whereId($id)->delete();

        return $this->sendResponse([], 'Employee Berhasil Dihapus.');
    }
}
