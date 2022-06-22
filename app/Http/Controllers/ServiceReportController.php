<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\EmployeeOrder;
use App\Models\ServiceReport;
use App\Models\Service;
use App\Models\Employee;
use App\Models\TypeService;
use App\Models\Customer;
use App\Models\MaterialAssigned;
use App\Models\ToolAssigned;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

/**
 * Class ServiceReportController
 * @package App\Http\Controllers
 */
class ServiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = $_GET['id_ticket'];
        $serviceReports = ServiceReport::paginate();
        //echo($datas);
        $reports2 = ServiceReport::select('service_report_id','time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id')
        ->where('service_id', '=', $datas)->get();

        $dataServiceReport = ['service_report' => $reports2];

        $services = Service::select('service_id')
        ->where('service_id', '=', $datas)->get();

        $services = preg_replace('/[^0-9]/', '', $services);

        $service2 = Service::select('service_order_id')
        ->where('service_id', '=', $datas)->get();

        $service2 = preg_replace('/[^0-9]/', '', $service2);

        /*$service = str_replace('service_order_id','',$service);
        $services = $service[5];*/

        $serviceOrder = ServiceOrder::select('service_order_id','date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $service2)->get();

        /*$serviceOrder = str_replace('service_order_id','',$serviceOrder);
        $serviceOrder = $serviceOrder[5];*/
        $serviceOrder = preg_replace('/[^0-9]/', '', $serviceOrder);

        $materialAssigneds = MaterialAssigned::select('material_id', 'quantity', 'unit_measure', 'usage', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[0])->get();

        $toolAssigneds = ToolAssigned::select('tool_id', 'quantity', 'unit_measure', 'usage', 'service_order_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[0])->get();

        $dataActivity = Activity::select('service_id', 'description_activity', 'previous_evidence', 'subsequent_evidence', 'signature_evidence', 'user_id', 'date_registration')
        ->where('service_id', '=', $datas)->get();

        $employeeOrders = EmployeeOrder::select('service_order_id', 'employee_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', $serviceOrder[0])->get();

        $serviceReport = ServiceReport::select('service_report_id','time_entry', 'time_completion', 'lunchtime', 'service_hours', 'service_extras', 'duration_travel', 'date_service', 'service_id', 'employee_id')
        ->where('service_id', '=', $datas)->get();

        //return response()->json($serviceReport);

        return view('service-report.index', compact('serviceReports','serviceReport','reports2','materialAssigneds','toolAssigneds','dataActivity','employeeOrders','serviceOrder','services','service2'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceReports->perPage());
        /*$serviceReports = ServiceReport::paginate();

        return view('service-report.index', compact('serviceReports'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceReports->perPage());*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $serviceReport = new ServiceReport();
        $service = Service::pluck('service_id','service_id');
        $employee = Employee::pluck('name','employee_id'); 
        $typeservice = TypeService::pluck('name','type_service_id');
        $customer = Customer::pluck('name','customer_id');

        $employeeOrders = EmployeeOrder::all();
        //return response()->json($service);
        return view('service-report.create', compact('serviceReport','service','employee','employeeOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServiceReport::$rules);

        $dataServiceReport = request()->except('_token');

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $dataServiceReport['service_id']=$results['id'];*/
        //$completion = date("g.i",strtotime($dataServiceReport['time_completion']));
        //$entry = date("g.i",strtotime($dataServiceReport['time_entry']));
        
        $completion = (float) preg_replace('/^(\d+):(\d+).+/','\1.\2',$dataServiceReport['time_completion']);

        $entry = (float) preg_replace('/^(\d+):(\d+).+/','\1.\2',$dataServiceReport['time_entry']);

        $lunchtime = (float) preg_replace('/^(\d+):(\d+).+/','\1.\2',$dataServiceReport['lunchtime']);

        $completion = number_format($completion, 2);

        $entry = number_format($entry, 2);

        $lunchtime = number_format($lunchtime, 2);

        //$lunchtime = (1 + ($lunchtime/.60))

        $dataServiceReport['service_hours'] = number_format($completion - $entry, 2);

        //$dataServiceReport['service_hours'] = double($dataServiceReport['time_completion']) - double($dataServiceReport['time_entry']);*/
        //return response()->json($dataServiceReport['service_hours']);
        ServiceReport::insert($dataServiceReport);
        
        $data = Service::find($dataServiceReport['service_id']);
        $data->status_report_id='2';
        $data->save();

        //$serviceReport = ServiceReport::create($request->all());
        
        return redirect()->route('services.index','id_ticket='.$dataServiceReport['service_id'])
            ->with('success', __('created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceReport = ServiceReport::find($id);

        return view('service-report.show', compact('serviceReport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceReport = ServiceReport::find($id);
        $service = Service::pluck('service_id','service_id');
        $employee = Employee::pluck('name','employee_id');
        $typeservice = TypeService::pluck('name','type_service_id');
        $customer = Customer::pluck('name','customer_id');
        return view('service-report.edit', compact('serviceReport','service','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceReport $serviceReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceReport $serviceReport)
    {
        request()->validate(ServiceReport::$rules);

        $serviceReport->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'ServiceReport updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceReport = ServiceReport::find($id)->delete();

        $serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);

        return redirect()->route('services.index', 'id_ticket='.$ServiceReport['service_id'])
            ->with('success', __('ServiceReport deleted successfully'));
    }
}
