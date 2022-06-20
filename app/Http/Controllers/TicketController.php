<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\TicketStatus;
use App\Models\ServiceOrder;
use App\Models\TypeService;
use App\Models\TypeMaintenance;
use App\Models\Priority;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate();

        $serviceOrder = new ServiceOrder();

        $service = TypeService::pluck('name','type_service_id');

        $maintenance = TypeMaintenance::pluck('name','type_maintenance_id');

        $priority = Priority::pluck('name','priority_id');

        return view('ticket.index', compact('tickets','serviceOrder','service','maintenance','priority'))
            ->with('i', (request()->input('page', 1) - 1) * $tickets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        $status = Status::pluck('name','status_id');
        $customers = Customer::pluck('name','customer_id');
        $customer2 = 0000000002;//Customer::pluck('customer_id');
        //$contact2 = "SELECT 'name' FROM contact WHERE customer_id = '$customer'";
        //$contact = Contact::where('customer_id', $customer2)->pluck('name','contact_id'); //
        $contacts = Contact::pluck('name','contact_id');
        $priority = Priority::pluck('name','priority_id');
        
        $customer = new Customer();
        $contact = new Contact();
        $contacts2 = Contact::all();
        $customers2 = Customer::all();

        $countries = \DB::table('customer')
            ->get();

        return view('ticket.create', compact('ticket','status','customers2','contacts2','priority','customers','contacts','customer','contact','countries'));
        //return view('ticket.create', compact('ticket','status','priority','customers','contacts'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ticket::$rules);

        $tickets = request()->except('_token');

        $tickets ['status_ticket_id'] = 1;

        //return response()->json($tickets);

        Ticket::insert($tickets);

        $data = Ticket::latest('ticket_id')->first();

        //return response()->json($data['ticket_id']);
        //$ticket = Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket '.$data['ticket_id'].' '.__('created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $status = TicketStatus::pluck('name','status_ticket_id');
        $customer = Customer::pluck('name','customer_id');
        //$contact2 = "SELECT 'name' FROM contact WHERE customer_id = '$customer'";
        $contact = Contact::pluck('name','contact_id');
        
        $contacts = new Contact();
        $status = Status::pluck('name','status_id');

        return view('ticket.edit', compact('ticket','status','customer','contact','contacts','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket'.' '.__('updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket'.' '.__('deleted successfully'));
    }
}
