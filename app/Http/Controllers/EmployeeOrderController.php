<?php

namespace App\Http\Controllers;

use App\Models\EmployeeOrder;
use App\Models\Employee;
use App\Models\ServiceOrder;
use DB;
use Illuminate\Http\Request;

/**
 * Class EmployeeOrderController
 * @package App\Http\Controllers
 */
class EmployeeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datas = $_GET['order'];
        $employeeOrders = EmployeeOrder::paginate();

        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        return view('employee-order.index', compact('employeeOrders','serviceOrder'))
            ->with('i', (request()->input('page', 1) - 1) * $employeeOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeOrder = new EmployeeOrder();
        $employees = Employee::pluck('name','employee_id');
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');
        return view('employee-order.create', compact('employeeOrder','employees','serviceOrder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(EmployeeOrder::$rules);

        $employeeOrder = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $employeeOrder['service_order_id']=$results['order'];*/
        
        $employeeOrder['status_id']=1;

        //return response()->json($employeeOrder);
        EmployeeOrder::insert($employeeOrder);

        //$employeeOrder = EmployeeOrder::create($request->all());

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $employeeOrder['service_order_id'])->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', __('Employee created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeOrder = EmployeeOrder::find($id);

        return view('employee-order.show', compact('employeeOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeOrder = EmployeeOrder::find($id);
        $employee = Employee::pluck('name','employee_id');
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');
        return view('employee-order.edit', compact('employeeOrder','employee','serviceOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeOrder $employeeOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeOrder $employeeOrder)
    {
        request()->validate(EmployeeOrder::$rules);

        $employeeOrder->update($request->all());

        return redirect()->route('employee-orders.index')
            ->with('success', __('EmployeeOrder updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        $serviceOrder = ServiceOrder::find($id);

        $employeeOrder = EmployeeOrder::find($id);
        //$employeeOrder = EmployeeOrder::find($id)->delete();

        $serviceOrder = $employeeOrder->service_order_id;

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $serviceOrder)->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        //return response()->json($serviceOrder);

        $employeeOrder = EmployeeOrder::find($id)->delete();
        
        /*$serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);*/

        return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', __('Employee deleted successfully'));
    }
}
