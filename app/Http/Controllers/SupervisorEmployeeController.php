<?php

namespace App\Http\Controllers;

use App\Models\SupervisorEmployee;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;

/**
 * Class SupervisorEmployeeController
 * @package App\Http\Controllers
 */
class SupervisorEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisorEmployees = SupervisorEmployee::paginate();
        $employee = Employee::select(DB::raw("CONCAT(name, ' ', last_name) as full_name"))
        ->get()->pluck('full_name');
        return view('supervisor-employee.index', compact('supervisorEmployees','employee'))
            ->with('i', (request()->input('page', 1) - 1) * $supervisorEmployees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisorEmployee = new SupervisorEmployee();
        //$employee = Employee::pluck('name','employee_id');
        $department = Department::pluck('name','department_id');
        $employee = Employee::select(DB::raw("CONCAT(name, ' ', last_name) as full_name"))
        ->get()->pluck('full_name');
        
        return view('supervisor-employee.create', compact('supervisorEmployee','department','employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SupervisorEmployee::$rules);

        $supervisorEmployee = SupervisorEmployee::create($request->all());

        return redirect()->route('supervisor-employees.index')
            ->with('success', 'SupervisorEmployee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisorEmployee = SupervisorEmployee::find($id);

        return view('supervisor-employee.show', compact('supervisorEmployee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisorEmployee = SupervisorEmployee::find($id);

        return view('supervisor-employee.edit', compact('supervisorEmployee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SupervisorEmployee $supervisorEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupervisorEmployee $supervisorEmployee)
    {
        request()->validate(SupervisorEmployee::$rules);

        $supervisorEmployee->update($request->all());

        return redirect()->route('supervisor-employees.index')
            ->with('success', 'SupervisorEmployee updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $supervisorEmployee = SupervisorEmployee::find($id)->delete();

        return redirect()->route('supervisor-employees.index')
            ->with('success', 'SupervisorEmployee deleted successfully');
    }
}
