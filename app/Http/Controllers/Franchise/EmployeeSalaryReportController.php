<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeSalaryReportController extends Controller
{
    public function index()
    {
        $employeesId = Employee::whereFranchise(auth()->user()->franchise->id)->pluck('id')->toArray();
        $year = EmployeeSalary::select(DB::raw('year as year'))->where('employee_id', $employeesId)->distinct()->get();
        $employees = Employee::whereFranchise(auth()->user()->franchise->id)->get();
        $salaries = EmployeeSalary::whereHas('employee', function ($query) {
            $query->where('franchise_id', auth()->user()->franchise->id);
            if (request()->get('filter_by') != null) {
                if (request()->get('filter_by') == "employee") {
                    $query->where('employee_id', request()->get('employee'));
                } else {
                    $query->where('year', request()->get('year'));
                }
            }
        })->get();
        return view('pages.franchise.employee.reports.index', compact('employees', 'year', 'salaries'));
    }
    public function pdf()
    {
        $salaries = EmployeeSalary::whereHas('employee', function ($query) {
            $query->where('franchise_id', auth()->user()->franchise->id);
            if (request()->get('filter_by') != null) {
                if (request()->get('filter_by') == "employee") {
                    $query->where('employee_id', request()->get('employee'));
                } else {
                    $query->where('year', request()->get('year'));
                }
            }
        })->get();
        $pdf = PDF::loadView('pages.franchise.employee.reports.pdf', ['salaries' => $salaries]);
        return $pdf->download('Salary Report.pdf');
    }
}
