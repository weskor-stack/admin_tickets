<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\ServiceReport;
use App\Models\OrderStatus;
use App\Models\Ticket;
use App\Models\TypeMaintenance;
use App\Models\TypeService;
use App\Models\Service;
use App\Models\ReportStatus;
use App\Models\Priority;
use App\Models\Customer;
use App\Models\Material;
use App\Models\UnitMeasure;
use App\Models\MaterialAssigned;
use App\Models\ToolAssigned;
use App\Models\Tool;
use App\Models\EmployeeOrder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\SupervisorEmployee;
use DB;
use Illuminate\Http\Request;

/**
 * Class ServiceOrderController
 * @package App\Http\Controllers
 */
class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $_GET['id_ticket'];
        
        //$serviceOrders = ServiceOrder::paginate();

        /*$serviceOrder2 = ServiceOrder::select('service_order_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->get();


        //return response()->json($serviceOrder);

        return view('service-order.index', compact('serviceOrders','serviceOrder2'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());*/

        //return response()->json($datas);

        $serviceOrders = ServiceOrder::paginate();
        
        $service = Service::select('service_id', 'date_service', 'status_report_id', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', '1')->get();
        $service = Service::pluck('service_order_id','service_id');

        $materialAssigned = new MaterialAssigned();
        $material = Material::select(DB::raw("CONCAT(material.key, ' - ', material.name) as full_name"))
        ->get()->pluck('full_name');
        $materials = Material::all();
        $unit_measure = UnitMeasure::all();
        //$material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');
        $tools = Tool::all();

        $employeeOrder = new EmployeeOrder();
        $employee = Employee::pluck('name','employee_id');
        $employees = Employee::select(DB::raw("CONCAT(employee.name, ' ', employee.last_name) as full_name"))
        ->get()->pluck('full_name');
        $employee2 = Employee::all();
        /*$serviceOrder = ServiceOrder::select('service_order_id')
        ->where('ticket_id', '=', $datas)->get();*/

        $serviceOrder_all = ServiceOrder::select('service_order_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->get();

        /*$serviceOrder = str_replace('service_order_id','',$serviceOrder);
        $serviceOrder = $serviceOrder[6];*/

        $serviceOrder_all = preg_replace('/[^0-9]/', '', $serviceOrder_all);

        //return response()->json($serviceOrder_all);

        $serviceOrder2 = ServiceOrder::select('service_order_id')
        ->where('ticket_id', '=', $datas)->get();
        
        $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);
        
        $serviceOrder = ServiceOrder::find($serviceOrder2);

        //return response()->json($serviceOrder);

        $serviceOrder2 = ServiceOrder::select('service_order_id')
        ->where('ticket_id', '=', $datas)->get();

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder_all[0])->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder_all[0])->get();

        $employeeOrders = EmployeeOrder::select('service_order_id', 'employee_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder_all[0])->get();

        $employeeOrders2 = EmployeeOrder::select('employee_id')
        ->where('service_order_id', '=', $serviceOrder_all[0])->get();

        $reports2 = ServiceOrder::select('service_order_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->get();

        $service = new Service();
        $status = ReportStatus::pluck('name','status_report_id');
        
        $serviceReport = ServiceReport::pluck('service_id','service_id');
        //return response()->json($reports2);

        $tickets = Ticket::select('ticket_id')
        ->where('ticket_id', '=', $datas)->get();

        $serviceOrder3 = ServiceOrder::select('service_order_id')
        ->where('ticket_id', '=', $datas)->get();

        $serviceOrder3 = preg_replace('/[^0-9]/', '', $serviceOrder3);

        $materialAssigneds_2 = MaterialAssigned::select('material_assigned_id')
        ->where('service_order_id', '=', $serviceOrder3)->get();

        $materialAssigneds_2 = preg_replace('/[^0-9]/', '', $materialAssigneds_2);

        $materialAssigneds_3 = MaterialAssigned::all();
        //return response()->json($materialAssigneds);
        

        //return response()->json($employeeOrders2);

        $supervisors = SupervisorEmployee::all();
        //$supervisors = SupervisorEmployee::pluck('supervisor_employee_id','department_id');

        //return response()->json($supervisors);
        
        return view('service-order.index', compact('serviceOrders','serviceOrder','serviceOrder_all','service','materialAssigned','material','toolAssigned','tool','materialAssigneds','toolAssigneds','employeeOrder','employee','employeeOrders','reports2','status','serviceReport',
        'tickets','materialAssigneds_2','materials','tools','supervisors','employees','employee2','unit_measure'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceOrder = new ServiceOrder();
        $ticket = Ticket::pluck('customer_id','ticket_id');
        $customer = Customer::pluck('name','customer_id');
        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');
        $service = TypeService::pluck('name','type_service_id');
        $status = OrderStatus::pluck('name','status_order_id'); 

        $materialAssigned = new MaterialAssigned();
        $material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');

        $service = Service::pluck('service_order_id','service_id');
        
        return view('service-order.create', compact('serviceOrder','ticket','maintenance','service','status','service','materialAssigned','material','toolAssigned','tool'));
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
        request()->validate(ServiceOrder::$rules);

        $serviceOrder = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id_ticket']);
        $serviceOrder['ticket_id']=$results['id_ticket'];*/
        
        //return response()->json($serviceOrder['ticket_id']);
        ServiceOrder::insert($serviceOrder);

        $data = Ticket::find($serviceOrder['ticket_id']);
        $data->status_ticket_id='2';
        $data->save();

        //$serviceOrder = ServiceOrder::create($request->all());

        return redirect()->route('service-orders.index','id_ticket='. $serviceOrder['ticket_id'])
            ->with('success', __('Service Order') .' '.__('created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceOrder = ServiceOrder::find($id);

        $serviceOrders = ServiceOrder::paginate();
        
        $service = Service::select('service_id', 'date_service', 'status_report_id', 'service_order_id', 'priority_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', '1')->get();
        
        $service = Service::pluck('service_order_id','service_id');

        $materialAssigned = new MaterialAssigned();
        $material = Material::pluck('key','material_id');

        $toolAssigned = new ToolAssigned();
        $tool = Tool::pluck('key','tool_id');

        $employeeOrder = new EmployeeOrder();
        $employee = Employee::pluck('name','employee_id');
        /*$serviceOrder = ServiceOrder::select('service_order_id')
        ->where('ticket_id', '=', $datas)->get();*/

        $serviceOrder2 = ServiceOrder::select('service_order_id')->get();

        /*$serviceOrder = str_replace('service_order_id','',$serviceOrder);
        $serviceOrder = $serviceOrder[6];*/

        $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'unit_measure', 'usage', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder2)->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'unit_measure', 'usage', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder2)->get();

        $employeeOrders = EmployeeOrder::select('service_order_id', 'employee_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder2)->get();

        $reports2 = ServiceOrder::select('service_order_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder2)->get();

        return view('service-order.show', compact('serviceOrder','serviceOrders','serviceOrder2','service','materialAssigned','material','toolAssigned','tool','materialAssigneds','toolAssigneds','employeeOrder','employee','employeeOrders','reports2'))
        ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceOrder = ServiceOrder::find($id);
        $ticket = Ticket::pluck('subject','ticket_id');
        $customer = Customer::pluck('name','customer_id');
        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');
        $service = TypeService::pluck('name','type_service_id');
        $status = OrderStatus::pluck('name','status_order_id');
        return view('service-order.edit', compact('serviceOrder','customer','maintenance','service','status','ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceOrder $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        request()->validate(ServiceOrder::$rules);

        $statement = DB::statement("SET @user_id = 9999");
        $serviceOrders = ServiceOrder::select('service_order_id')
        ->where('service_order_id', '=', $serviceOrder->ticket_id)->get();
        
        //return response()->json($request);

        //$reports2 = preg_replace('/[^0-9]/', '', $serviceOrders);

        //return response()->json($reports2);

        $serviceOrder->update($request->all());

        return redirect()->route('service-orders.index','id_ticket='.$serviceOrder->ticket_id)
            ->with('success', __('Service Order') .' '.__('updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceOrder = ServiceOrder::find($id)->delete();

        return redirect()->route('service-orders.index')
            ->with('success', __('Service Order') .' '.__('deleted successfully'));
    }
}
