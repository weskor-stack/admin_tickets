<?php

namespace App\Http\Controllers;

use App\Models\UnitMeasure;
use Illuminate\Http\Request;

/**
 * Class UnitMeasureController
 * @package App\Http\Controllers
 */
class UnitMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitMeasures = UnitMeasure::paginate();

        return view('unit-measure.index', compact('unitMeasures'))
            ->with('i', (request()->input('page', 1) - 1) * $unitMeasures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitMeasure = new UnitMeasure();
        return view('unit-measure.create', compact('unitMeasure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UnitMeasure::$rules);

        $unitMeasure = UnitMeasure::create($request->all());

        return redirect()->route('unit-measures.index')
            ->with('success', 'UnitMeasure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unitMeasure = UnitMeasure::find($id);

        return view('unit-measure.show', compact('unitMeasure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitMeasure = UnitMeasure::find($id);

        return view('unit-measure.edit', compact('unitMeasure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UnitMeasure $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitMeasure $unitMeasure)
    {
        request()->validate(UnitMeasure::$rules);

        $unitMeasure->update($request->all());

        return redirect()->route('unit-measures.index')
            ->with('success', 'UnitMeasure updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unitMeasure = UnitMeasure::find($id)->delete();

        return redirect()->route('unit-measures.index')
            ->with('success', 'UnitMeasure deleted successfully');
    }
}
