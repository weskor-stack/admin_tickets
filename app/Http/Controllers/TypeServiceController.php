<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

/**
 * Class TypeServiceController
 * @package App\Http\Controllers
 */
class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeServices = TypeService::paginate(5);

        return view('type-service.index', compact('typeServices'))
            ->with('i', (request()->input('page', 1) - 1) * $typeServices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeService = new TypeService();
        return view('type-service.create', compact('typeService'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeService::$rules);

        $typeService = TypeService::create($request->all());

        return redirect()->route('type-services.index')
            ->with('success', 'TypeService created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeService = TypeService::find($id);

        return view('type-service.show', compact('typeService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeService = TypeService::find($id);

        return view('type-service.edit', compact('typeService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeService $typeService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeService $typeService)
    {
        request()->validate(TypeService::$rules);

        $typeService->update($request->all());

        return redirect()->route('type-services.index')
            ->with('success', 'TypeService updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeService = TypeService::find($id)->delete();

        return redirect()->route('type-services.index')
            ->with('success', 'TypeService deleted successfully');
    }
}
