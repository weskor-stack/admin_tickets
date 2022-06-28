<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Status;
use Illuminate\Http\Request;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(3);

        return view('contact.index', compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * $contacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact();
        $status = Status::pluck('name','status_id');
        $customers = Customer::pluck('name','customer_id');
        return view('contact.create', compact('contact','status','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contact::$rules);

        $contacts = request()->except('_token');

        $contact['name'] = $contacts['name'];

        $contact['last_name'] = $contacts['last_name'];

        $contact['email'] = $contacts['email'];

        $contact['phone'] = $contacts['phone'];

        $contact['customer_id'] = $contacts['ejemplo'];

        $contact['status_id'] = $contacts['status_id'];

        $contact['user_id'] = $contacts['user_id'];

        //return response()->json( $contacts);
        Contact::insert($contact);
        //$contact = Contact::create($request->all());

        //return redirect()->route('tickets.create')
        return redirect()->back()
            ->with('success', __('Contact created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $status = Status::pluck('name','status_id');
        $customer = Customer::pluck('name','customer_id');
        return view('contact.edit', compact('contact','status','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        request()->validate(Contact::$rules);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
            ->with('success', __('Contact updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();

        return redirect()->route('contacts.index')
            ->with('success', __('Contact deleted successfully'));
    }
}
