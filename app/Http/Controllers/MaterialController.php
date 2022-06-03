<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

/**
 * Class MaterialController
 * @package App\Http\Controllers
 */
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::paginate(20);

        return view('material.index', compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * $materials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = new Material();
        return view('material.create', compact('material'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Material::$rules);

        $material = Material::create($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);

        return view('material.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);

        return view('material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Material $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        request()->validate(Material::$rules);

        $material->update($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $material = Material::find($id)->delete();

        return redirect()->route('materials.index')
            ->with('success', 'Material deleted successfully');
    }
}
