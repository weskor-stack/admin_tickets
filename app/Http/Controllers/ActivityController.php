<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Employee;
use App\Models\EmployeeOrder;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ActivityController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::paginate(5);

        $employeeOrder = EmployeeOrder::pluck('employee_id','employee_id');

        $employee = EmployeeOrder::pluck('name','employee_id');
        
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        return view('activity.index', compact('activities','employeeOrder','employee','serviceOrder'))
            ->with('i', (request()->input('page', 1) - 1) * $activities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = new Activity();
        $service = Service::pluck('service_id','service_id');

        $employeeOrders = EmployeeOrder::all();
        
        return view('activity.create', compact('activity','service','employeeOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Activity::$rules);
        $dataActivity = request()->except('_token','signed');

        if ($request->hasFile('previous_evidence')) {
            $dataActivity['previous_evidence']=$request->file('previous_evidence')->store('previous_evidence','public');
            # code...
        }

        if ($request->hasFile('subsequent_evidence')) {
            $dataActivity['subsequent_evidence']=$request->file('subsequent_evidence')->store('subsequent_evidence','public');
            # code...
        }

        /*if ($request->hasFile('signature_evidence')) {
            $dataActivity['signature_evidence']=$request->file('signature_evidence')->store('signatures','public');
            # code...
        }*/

        //$dataActivity = request()->except('_token','signed');
        //$folderPath = public_path('storage/signatures/');
        $image = explode(";base64,", $request->signature_evidence);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        //$file = $folderPath . uniqid() . '.'.$image_type_png;
        //file_put_contents($file, $image_base64);

        $image_file = $request->signature_evidence;
        
        $form_data = array (
            'signature_evidence'=>$image_file
        );

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $dataActivity['service_id']=$results['id'];*/

        $dataActivity['signature_evidence']=$image_file;

        //$dataActivity['signature_evidence']=$image_file->store('signatures','public');;

        //return response()->json($dataActivity);

        Activity::insert($dataActivity);

        $data = Service::find($dataActivity['service_id']);
        $data->status_report_id='3';
        $data->save();

        /*$data2 = ServiceOrder::find($dataActivity['service_id']);
        $data2->status_order_id='3';
        $data2->save();*/

        $service2 = Service::select('service_order_id')
        ->where('service_id', '=', $dataActivity['service_id'])->get();

        $service2 = preg_replace('/[^0-9]/', '', $service2);

        $serviceOrder = ServiceOrder::select('service_order_id')
        ->where('service_order_id', '=', $service2)->get();

        $serviceOrder = preg_replace('/[^0-9]/', '', $serviceOrder);

        $data2 = ServiceOrder::find($serviceOrder);
        $data2->status_order_id='3';
        $data2->save();

        $serviceOrder2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $service2)->get();

        $serviceOrder2 = preg_replace('/[^0-9]/', '', $serviceOrder2);

        $data3 = Ticket::find($serviceOrder2);
        $data3->status_ticket_id='4';
        $data3->save();

        //return response()->json($data2);

        return redirect()->route('services.index','id_ticket='. $dataActivity['service_id'])
        ->with('success', __('Report completed successfully'));
        
        /*request()->validate(Activity::$rules);

        $activity = Activity::create($request->all());

        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);

        return view('activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        $service = Service::pluck('service_id','service_id');
        return view('activity.edit', compact('activity','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataActivity = $request->except('_token','_method','signed');

        if ($request->hasFile('previous_evidence')) {
            $activity = Activity::find($id);
            Storage::delete('public/'.$activity->previous_evidence);
            $dataActivity['previous_evidence']=$request->file('previous_evidence')->store('previous_evidence','public');
            # code...
        }
        if ($request->hasFile('subsequent_evidence')) {
            $activity = Activity::find($id);
            Storage::delete('public/'.$activity->subsequent_evidence);
            $dataActivity['subsequent_evidence']=$request->file('subsequent_evidence')->store('subsequent_evidence','public');
            # code...
        }

        if ($request->hasFile('signature_evidence')) {
            $activity = Activity::find($id);
            Storage::delete('public/'.$activity->signature_evidence);
            $dataActivity['signature_evidence']=$request->file('signature_evidence')->store('signatures','public');
            # code...
        }

        $activity = Activity::find($id);
        $service = Service::pluck('service_order_id','service_id');
        Activity::where('service_id','=',$id) -> update($dataActivity);

        //return response()->json($dataActivity);

        return redirect()->route('activities.index')
            ->with('success', __('Activity updated successfully'));
        /*request()->validate(Activity::$rules);

        $activity->update($request->all());

        return redirect()->route('activities.index')
            ->with('success', 'Activity updated successfully');*/
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);

        if (Storage::delete('public/'.$activity->previous_evidence)) {
            Activity::destroy($id);
        }

        if (Storage::delete('public/'.$activity->subsequent_evidence)) {
            Activity::destroy($id);
        }

        if (Storage::delete('public/'.$activity->signature_evidence)) {
            Activity::destroy($id);
        }

        return redirect()->route('activities.index')
            ->with('success', __('Activity deleted successfully'));
    }

    public function save(Request $request)
    {
        $folderPath = public_path('storage/signatures/');
        $image = explode(";base64,", $request->signed);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        file_put_contents($file, $image_base64);
        //return response()->json($file);
        return back()->with('success', 'Signature store successfully !!');
    }
}
