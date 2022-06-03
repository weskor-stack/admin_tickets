<?php

namespace App\Http\Controllers;

use App\Models\TypeMaintenance;
use Illuminate\Http\Request;

/**
 * Class TypeMaintenanceController
 * @package App\Http\Controllers
 */
class TypeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeMaintenances = TypeMaintenance::paginate(5);

        return view('type-maintenance.index', compact('typeMaintenances'))
            ->with('i', (request()->input('page', 1) - 1) * $typeMaintenances->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeMaintenance = new TypeMaintenance();
        return view('type-maintenance.create', compact('typeMaintenance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeMaintenance::$rules);

        $typeMaintenance = TypeMaintenance::create($request->all());

        return redirect()->route('type-maintenances.index')
            ->with('success', 'TypeMaintenance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeMaintenance = TypeMaintenance::find($id);

        return view('type-maintenance.show', compact('typeMaintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeMaintenance = TypeMaintenance::find($id);

        return view('type-maintenance.edit', compact('typeMaintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeMaintenance $typeMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeMaintenance $typeMaintenance)
    {
        request()->validate(TypeMaintenance::$rules);

        $typeMaintenance->update($request->all());

        return redirect()->route('type-maintenances.index')
            ->with('success', 'TypeMaintenance updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeMaintenance = TypeMaintenance::find($id)->delete();

        return redirect()->route('type-maintenances.index')
            ->with('success', 'TypeMaintenance deleted successfully');
    }
}
