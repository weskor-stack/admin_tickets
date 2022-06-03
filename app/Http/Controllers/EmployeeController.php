<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\SupervisorEmployee;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(3);

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $status = Status::pluck('name','status_id');
        
        return view('employee.create', compact('employee','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Employee::$rules);
        //$datosEmpleado = $request->all();
        $datosEmpleado = $request->except('_token');

        if ($request->hasFile('picture')) {
            $datosEmpleado['picture']=$request->file('picture')->store('uploads','public');
            # code...
        }
        Employee::insert($datosEmpleado);

        //return response()->json($datosEmpleado);
        // request()->validate(Employee::$rules);

        // $employee = Employee::create($request->all());

        return redirect()->route('employees.index')
             ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $status = Status::pluck('name','status_id');
       
        return view('employee.edit', compact('employee','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = $request->except('_token','_method');
        //Employee::where('employee_id','=',$id) -> update($datosEmpleado);
        

        if ($request->hasFile('picture')) {
            $employee = Employee::find($id);
            Storage::delete('public/'.$employee->picture);
            $datosEmpleado['picture']=$request->file('picture')->store('uploads','public');
            # code...
        }
        
        $employee = Employee::find($id);
        $status = Status::pluck('name','status_id');
        
        Employee::where('employee_id','=',$id) -> update($datosEmpleado);
        
        //return view('employee.edit', compact('employee','status','department'));

        return redirect()->route('employees.index')
            ->with('success', 'Empleado actualizado correctamente.');
        //return view('employee.edit', compact('employee','status','department'));
        //return response()->json($datosEmpleado);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (Storage::delete('public/'.$employee->picture)) {
            Employee::destroy($id);
        }

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
