<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\OrderStatus;
use App\Models\Ticket;
use App\Models\TypeMaintenance;
use App\Models\TypeService;
use App\Models\Service;
use App\Models\Customer;
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
        //$datas = $_GET['id_ticket'];
        /*$serviceOrders = ServiceOrder::paginate();

        $serviceOrder2 = ServiceOrder::select('service_order_id', 'date_order', 'ticket_id', 'type_maintenance_id', 'type_service_id', 'status_order_id', 'user_id', 'date_registration')
        ->where('ticket_id', '=', $datas)->get();


        //return response()->json($serviceOrder);

        return view('service-order.index', compact('serviceOrders','serviceOrder2'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceOrders->perPage());*/

        $serviceOrders = ServiceOrder::paginate();
        
        /*$service = Service::select('service_id', 'date_service', 'status_report_id', 'service_order_id', 'priority_id', 'user_id', 'date_registration')
        ->where('service_order_id', '=', '1')->get();*/
        $service = Service::pluck('service_order_id','service_id');

        return view('service-order.index', compact('serviceOrders','service'))
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

        $service = Service::pluck('service_order_id','service_id');
        return view('service-order.create', compact('serviceOrder','ticket','maintenance','service','status','service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServiceOrder::$rules);

        $serviceOrder = request()->except('_token');

        $url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $serviceOrder['ticket_id']=$results['id_ticket'];
        
        //return response()->json($serviceOrder);
        ServiceOrder::insert($serviceOrder);

        //$serviceOrder = ServiceOrder::create($request->all());

        return redirect()->route('service-orders.index')
            ->with('success', 'ServiceOrder created successfully.');
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

        return view('service-order.show', compact('serviceOrder'));
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

        $serviceOrder->update($request->all());

        return redirect()->route('service-orders.index')
            ->with('success', 'ServiceOrder updated successfully');
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
            ->with('success', 'ServiceOrder deleted successfully');
    }
}
