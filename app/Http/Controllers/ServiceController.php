<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceReport;
use App\Models\ReportStatus;
use App\Models\ServiceOrder;
use App\Models\Customer;
use App\Models\Priority;
use App\Models\Employee;
use App\Models\EmployeeOrder;
use App\Models\MaterialAssigned;
use App\Models\MaterialUsed;
use App\Models\Material;
use App\Models\ToolAssigned;
use App\Models\ToolUsed;
use App\Models\Tool;
//use App\Models\Activity;
use App\Models\ServiceTaskSpecific;
use DB;
use Illuminate\Http\Request;
use PDF;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $_GET['id_ticket'];
        $services = Service::paginate();

        /*$service = Service::select('service_id', 'date_service', 'status_report_id', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $datas)->get();*/


        $service2 = Service::select('service_order_id')
        ->where('service_order_id', '=', $datas)->get();

        $service2 = preg_replace('/[^0-9]/', '', $service2);

        $serviceOrder = ServiceOrder::select('service_order_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $service2)->get();

        $serviceOrder = explode('"',$serviceOrder);
        $serviceOrder = preg_replace('/[^0-9]/', '', $serviceOrder);

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $service3 = Service::select('service_id')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $service3 = preg_replace('/[^0-9]/', '', $service3);

        $serviceReports = ServiceReport::select('service_report_id','time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id')
        ->where('service_id', '=', $service3)->get();

        $service = Service::find($service3);
        
        /*$serviceOrder = ServiceOrder::select('service_order_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $datas)->get();*/
        //$serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        $materialUseds = MaterialUsed::select('material_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $toolUseds = ToolUsed::select('tool_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $materialUsed = new MaterialUsed();

        $toolUsed =new ToolUsed();

        $serviceReport = new ServiceReport();

        $employee = Employee::pluck('name','employee_id');

        $serviceTaskSpecific = new ServiceTaskSpecific();
        
        $activity2 = ServiceTaskSpecific::select('service_id', 'description_task', 'previous_evidence', 'subsequent_evidence', 'signature_evidence', 'employee_id', 
        'contact_id','user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $employeeOrders = EmployeeOrder::all();

        /*$activities = explode('"',$activity2);
        $activities = preg_replace('/[^0-9]/', '', $activities);
        
        $activity = ServiceTaskSpecific::find($activity2);

        $serviceOrder2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $activities[2])->get();

        $serviceOrder2 = explode('"',$serviceOrder2);
        $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);

        $serviceOrder2 = $serviceOrder2[2];*/
        $materials2 = MaterialAssigned::select('material_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $material = MaterialAssigned::find($serviceOrder[2]);

        $material2 = MaterialAssigned::whereNotIn('material_id', MaterialUsed::select('material_id')
        ->where('service_order_id', '=', $serviceOrder[2]))->get();

        $tool2 = ToolAssigned::select('tool_id')->whereNotIn('tool_id', ToolUsed::select('tool_id')
        ->where('service_order_id', '=', $serviceOrder[2]))
        ->get();

        $tools2 = ToolAssigned::select('tool_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();
        //return response()->json($tools2);

        $service_report = ServiceReport::select('service_report_id', 'time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        //return response()->json($service_report);

        return view('service.index', compact('services','service','serviceOrder','serviceReport','employee','service2','serviceOrder','materialAssigneds','toolAssigneds',
        'serviceReports','serviceTaskSpecific', 'activity2','employeeOrders', 'materialUseds', 'materialUsed','materials2','tools2','toolUsed','toolUseds','tool2','material2',
        'service_report'))
            ->with('i', (request()->input('page', 1) - 1) * $services->perPage());
    }

    public function pdf()
    {
        $datas = $_GET['id_ticket'];

        $services = Service::paginate();

        $service2 = Service::select('service_order_id')
        ->where('service_order_id', '=', $datas)->get();

        $service2 = preg_replace('/[^0-9]/', '', $service2);

        $serviceOrder = ServiceOrder::select('service_order_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $service2)->get();

        $serviceOrder = explode('"',$serviceOrder);
        $serviceOrder = preg_replace('/[^0-9]/', '', $serviceOrder);

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $service3 = Service::select('service_id')
        ->where('service_order_id', '=', $serviceOrder[2])->get();

        $service3 = preg_replace('/[^0-9]/', '', $service3);

        $serviceReports = ServiceReport::select('service_report_id','time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id')
        ->where('service_id', '=', $service3)->get();

        $service = Service::find($service3);

        $materialUseds = MaterialUsed::select('material_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $toolUseds = ToolUsed::select('tool_id', 'quantity', 'service_id', 'user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $activity2 = ServiceTaskSpecific::select('service_id', 'description_task', 'previous_evidence', 'subsequent_evidence', 'signature_evidence', 'employee_id', 
        'contact_id','user_id', 'date_registration')
        ->where('service_id', '=', $service3)->get();

        $serviceTaskSpecific = new ServiceTaskSpecific();
        
        $pdf = PDF::loadView('service.pdf',['services' => $services], compact('services','service','serviceReports','materialUseds','toolUseds','activity2','serviceTaskSpecific'));
        return $pdf->stream();
        //return $pdf->download('order.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        $serviceorder = ServiceOrder::pluck('service_order_id','service_order_id');
        $serviceReport = ServiceReport::pluck('service_id','service_id');
        $status = ReportStatus::pluck('name','status_report_id');
        $customer = Customer::pluck('name','customer_id');
        $priority = Priority::pluck('name','priority_id');
        $employee = Employee::pluck('name','employee_id');

        return view('service.create', compact('service','status','serviceorder','customer','priority','serviceReport','employee'));
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
        request()->validate(Service::$rules);
        $dataService = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $dataService['service_order_id']=$results['id'];*/
        
        //return response()->json($dataService);

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $dataService['service_order_id'])->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        Service::insert($dataService);

        $serviceId = Service::select('service_order_id')
        ->where('service_order_id', '=', $dataService['service_order_id'])->get();

        $serviceId = preg_replace('/[^0-9]/', '', $serviceId);
        
        //return response()->json($serviceId);

        $data = ServiceOrder::find($dataService['service_order_id']);
        $data->status_order_id='2';
        $data->save();
        
        //$service = Service::create($request->all());

        return redirect()->route('services.index','id_ticket='.$serviceId)
            ->with('success', __('Report created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $serviceorder = ServiceOrder::pluck('service_order_id','service_order_id');
        $customer = Customer::pluck('name','customer_id');
        $status = ReportStatus::pluck('name','status_report_id');
        $priority = Priority::pluck('name','priority_id');
        return view('service.edit', compact('service','status','serviceorder','customer','priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(Service::$rules);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', __('Report updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        $service = Service::find($id)->delete();

        return redirect()->route('services.index')
            ->with('success', __('Report deleted successfully'));
    }
}
