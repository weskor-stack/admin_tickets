<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropdownController extends Controller
{
    //
    public function view()

    {
        $customers = \DB::table('customer')
            ->get();
        
        return view('dropdown', compact('customer'));
    }

    public function getContacts(Request $request)

    {
        $contacts = \DB::table('contact')
            ->where('customer_id', $request->customer_id)
            ->get();
        
        if (count($contacts) > 0) {
            return response()->json($contacts);
        }
    }
}
