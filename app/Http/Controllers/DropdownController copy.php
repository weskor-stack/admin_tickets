<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $countries = \DB::table('customer')
            ->get();
        
        return view('dropdown', compact('countries'));
    }

    /**
     * return states list.
     *
     * @return json
     */
    public function getStates(Request $request)
    {
        $states = \DB::table('contact')
            ->where('customer_id', $request->customer_id)
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    
}
