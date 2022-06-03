<?php

namespace App\Http\Controllers;

use App\Models\TicketStatus;
use Illuminate\Http\Request;

/**
 * Class TicketStatusController
 * @package App\Http\Controllers
 */
class TicketStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketStatuses = TicketStatus::paginate(5);

        return view('ticket-status.index', compact('ticketStatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $ticketStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticketStatus = new TicketStatus();
        return view('ticket-status.create', compact('ticketStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TicketStatus::$rules);

        $ticketStatus = TicketStatus::create($request->all());

        return redirect()->route('ticket-statuses.index')
            ->with('success', 'TicketStatus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketStatus = TicketStatus::find($id);

        return view('ticket-status.show', compact('ticketStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketStatus = TicketStatus::find($id);

        return view('ticket-status.edit', compact('ticketStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TicketStatus $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketStatus $ticketStatus)
    {
        request()->validate(TicketStatus::$rules);

        $ticketStatus->update($request->all());

        return redirect()->route('ticket-statuses.index')
            ->with('success', 'TicketStatus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticketStatus = TicketStatus::find($id)->delete();

        return redirect()->route('ticket-statuses.index')
            ->with('success', 'TicketStatus deleted successfully');
    }
}
