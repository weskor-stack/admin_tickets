<?php

namespace App\Http\Controllers;

use App\Models\ReportStatus;
use Illuminate\Http\Request;

/**
 * Class ReportStatusController
 * @package App\Http\Controllers
 */
class ReportStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportStatuses = ReportStatus::paginate(5);

        return view('report-status.index', compact('reportStatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $reportStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reportStatus = new ReportStatus();
        return view('report-status.create', compact('reportStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ReportStatus::$rules);

        $reportStatus = ReportStatus::create($request->all());

        return redirect()->route('report-statuses.index')
            ->with('success', 'ReportStatus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reportStatus = ReportStatus::find($id);

        return view('report-status.show', compact('reportStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reportStatus = ReportStatus::find($id);

        return view('report-status.edit', compact('reportStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ReportStatus $reportStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportStatus $reportStatus)
    {
        request()->validate(ReportStatus::$rules);

        $reportStatus->update($request->all());

        return redirect()->route('report-statuses.index')
            ->with('success', 'ReportStatus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reportStatus = ReportStatus::find($id)->delete();

        return redirect()->route('report-statuses.index')
            ->with('success', 'ReportStatus deleted successfully');
    }
}
