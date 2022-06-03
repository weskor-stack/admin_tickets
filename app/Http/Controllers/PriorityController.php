<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

/**
 * Class PriorityController
 * @package App\Http\Controllers
 */
class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::paginate();

        return view('priority.index', compact('priorities'))
            ->with('i', (request()->input('page', 1) - 1) * $priorities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priority = new Priority();
        return view('priority.create', compact('priority'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Priority::$rules);

        $priority = Priority::create($request->all());

        return redirect()->route('priorities.index')
            ->with('success', 'Priority created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priority = Priority::find($id);

        return view('priority.show', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priority = Priority::find($id);

        return view('priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Priority $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priority $priority)
    {
        request()->validate(Priority::$rules);

        $priority->update($request->all());

        return redirect()->route('priorities.index')
            ->with('success', 'Priority updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $priority = Priority::find($id)->delete();

        return redirect()->route('priorities.index')
            ->with('success', 'Priority deleted successfully');
    }
}
