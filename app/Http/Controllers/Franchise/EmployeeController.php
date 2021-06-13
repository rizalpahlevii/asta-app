<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.employee.index', compact('employees'));
    }

    public function pdf()
    {
        $employees = Employee::whereFranchise(auth()->user()->franchise->id)->get();
        $pdf = PDF::loadView('pages.franchise.employee.pdf', ['employees' => $employees]);
        return $pdf->download('Employee Data.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.franchise.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['franchise_id' => auth()->user()->franchise->id]);
        $validated =  $request->validate([
            'name' => 'required',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'franchise_id' => 'required'
        ]);
        $employee = new Employee();
        $employee->create($validated);
        Flashdata::success_alert("Success to create employee");
        return redirect(route('franchise.employee.index'));
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
        $employee = Employee::find($id);
        return view('pages.franchise.employee.edit', compact('employee'));
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
        $validated =  $request->validate([
            'name' => 'required',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
        $employee =  Employee::find($id);
        $employee->update($validated);
        Flashdata::success_alert("Success to update employee");
        return redirect(route('franchise.employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Flashdata::success_alert("Success to delete employee");
        return redirect(route('franchise.employee.index'));
    }
}
