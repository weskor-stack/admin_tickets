<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

/**
 * Class OrderStatusController
 * @package App\Http\Controllers
 */
class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderStatuses = OrderStatus::paginate(5);

        return view('order-status.index', compact('orderStatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $orderStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderStatus = new OrderStatus();
        return view('order-status.create', compact('orderStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrderStatus::$rules);

        $orderStatus = OrderStatus::create($request->all());

        return redirect()->route('order-statuses.index')
            ->with('success', 'OrderStatus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderStatus = OrderStatus::find($id);

        return view('order-status.show', compact('orderStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderStatus = OrderStatus::find($id);

        return view('order-status.edit', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrderStatus $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        request()->validate(OrderStatus::$rules);

        $orderStatus->update($request->all());

        return redirect()->route('order-statuses.index')
            ->with('success', 'OrderStatus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orderStatus = OrderStatus::find($id)->delete();

        return redirect()->route('order-statuses.index')
            ->with('success', 'OrderStatus deleted successfully');
    }
}
