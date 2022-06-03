<?php

namespace App\Http\Controllers;

use App\Models\ClassifiedMaterial;
use Illuminate\Http\Request;

/**
 * Class ClassifiedMaterialController
 * @package App\Http\Controllers
 */
class ClassifiedMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifiedMaterials = ClassifiedMaterial::paginate();

        return view('classified-material.index', compact('classifiedMaterials'))
            ->with('i', (request()->input('page', 1) - 1) * $classifiedMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classifiedMaterial = new ClassifiedMaterial();
        return view('classified-material.create', compact('classifiedMaterial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ClassifiedMaterial::$rules);

        $classifiedMaterial = ClassifiedMaterial::create($request->all());

        return redirect()->route('classified-materials.index')
            ->with('success', 'ClassifiedMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classifiedMaterial = ClassifiedMaterial::find($id);

        return view('classified-material.show', compact('classifiedMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classifiedMaterial = ClassifiedMaterial::find($id);

        return view('classified-material.edit', compact('classifiedMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ClassifiedMaterial $classifiedMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassifiedMaterial $classifiedMaterial)
    {
        request()->validate(ClassifiedMaterial::$rules);

        $classifiedMaterial->update($request->all());

        return redirect()->route('classified-materials.index')
            ->with('success', 'ClassifiedMaterial updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $classifiedMaterial = ClassifiedMaterial::find($id)->delete();

        return redirect()->route('classified-materials.index')
            ->with('success', 'ClassifiedMaterial deleted successfully');
    }
}
