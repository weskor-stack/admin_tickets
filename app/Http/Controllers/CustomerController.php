<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Status;
use Illuminate\Http\Request;
use DB;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        $status = Status::pluck('name','status_id');
        return view('customer.create', compact('customer','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Customer::$rules);
        $statement = DB::statement("SET @user_id = 9999");

       $customers = request()->except('_token');

       $customer = Customer::select('name')
        ->where('name', '=', $customers['name'])->get();

        //$customer = preg_replace('/[^0-9]/', '', $customer);
       $customer = explode('"',$customer);

        //return response()->json( $customer[3]);

        //return response()->json( $customers['name']);
        if($customer[0]== "[]"){
            Customer::insert($customers);
            return '<script>
                        alert("'.__('Customer created successfully').'"); 
                        javascript:history.go(-1); 
                    </script>';
        }else{
            return '<script>
                    alert("'.__('Duplicate customer, please perform the process again.').'"); 
                    javascript:history.go(-1); 
                </script>';
        }
        /*if ($customer[3] == $customers['name']) {
            return '<script>
                    alert("'.__('Duplicate customer, please perform the process again.').'"); 
                    javascript:history.go(-1); 
                </script>';
            return redirect()->back()
            ->with('success', __('Duplicate customer, please perform the process again.'));
        }else{
        //
            //return response()->json( $customers);
            Customer::insert($customers);

            //$customer = Customer::create($request->all());

            //return redirect()->route('tickets.create')
            return redirect()->back()
                ->with('success', __('Customer created successfully'));
            }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $status = Status::pluck('name','status_id');
        return view('customer.show', compact('customer','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $status = Status::pluck('name','status_id');
        return view('customer.edit', compact('customer','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate(Customer::$rules);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', __('Customer updated successfully'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();

        return redirect()->route('customers.index')
            ->with('success', __('Customer deleted successfully'));
    }
}
