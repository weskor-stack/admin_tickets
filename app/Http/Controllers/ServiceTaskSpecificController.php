<?php

namespace App\Http\Controllers;

use App\Models\ServiceTaskSpecific;
use App\Models\Employee;
use App\Models\EmployeeOrder;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ServiceTaskSpecificController
 * @package App\Http\Controllers
 */
class ServiceTaskSpecificController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceTaskSpecifics = ServiceTaskSpecific::paginate(5);

        $employeeOrder = EmployeeOrder::pluck('employee_id','employee_id');

        $employee = EmployeeOrder::pluck('name','employee_id');
        
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        return view('service-task-specific.index', compact('serviceTaskSpecifics','employeeOrder','employee','serviceOrder'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceTaskSpecifics->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceTaskSpecific = new ServiceTaskSpecific();
        $service = Service::pluck('service_id','service_id');
        $employeeOrders = EmployeeOrder::all();
        return view('service-task-specific.create', compact('serviceTaskSpecific','service','employeeOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServiceTaskSpecific::$rules);

        $dataActivity = request()->except('_token','signed');

        if ($request->hasFile('previous_evidence')) {
            $dataActivity['previous_evidence']=$request->file('previous_evidence')->store('previous_evidence','public');
            # code...
        }

        if ($request->hasFile('subsequent_evidence')) {
            $dataActivity['subsequent_evidence']=$request->file('subsequent_evidence')->store('subsequent_evidence','public');
            # code...
        }

        $image = explode(";base64,", $request->signed);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);

        $image_file = $request->signed;
        
        $form_data = array (
            'signature_evidence'=>$image_file
        );

        $url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);

        $dataActivity['service_id']=$results['id'];

        $dataActivity['signature_evidence']=$image_file;

        ServiceTaskSpecific::insert($dataActivity);

        $data = Service::find($dataActivity['service_id']);
        $data->status_report_id='3';
        $data->save();

        $data2 = ServiceOrder::find($dataActivity['service_id']);
        $data2->service_order_id='3';
        $data2->save();

        return redirect()->route('services.index')
        ->with('success', 'Activity created successfully.');
        /*$serviceTaskSpecific = ServiceTaskSpecific::create($request->all());

        return redirect()->route('service-task-specifics.index')
            ->with('success', 'ServiceTaskSpecific created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceTaskSpecific = ServiceTaskSpecific::find($id);

        return view('service-task-specific.show', compact('serviceTaskSpecific'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceTaskSpecific = ServiceTaskSpecific::find($id);
        $service = Service::pluck('service_id','service_id');
        return view('service-task-specific.edit', compact('serviceTaskSpecific','service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceTaskSpecific $serviceTaskSpecific
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceTaskSpecific $serviceTaskSpecific)
    {
        $statement = DB::statement("SET @user_id = 9999");
        //request()->validate(ServiceTaskSpecific::$rules);
        $dataActivity = $request->except('_token','_method','signed');

        /*$serviceTaskSpecific->update($request->all());

        return redirect()->route('service-task-specifics.index')
            ->with('success', 'ServiceTaskSpecific updated successfully');*/

        if ($request->hasFile('previous_evidence')) {
            $activity = ServiceTaskSpecific::find($id);
            Storage::delete('public/'.$activity->previous_evidence);
            $dataActivity['previous_evidence']=$request->file('previous_evidence')->store('previous_evidence','public');
            # code...
        }
        if ($request->hasFile('subsequent_evidence')) {
            $activity = ServiceTaskSpecific::find($id);
            Storage::delete('public/'.$activity->subsequent_evidence);
            $dataActivity['subsequent_evidence']=$request->file('subsequent_evidence')->store('subsequent_evidence','public');
            # code...
        }

        if ($request->hasFile('signature_evidence')) {
            $activity = ServiceTaskSpecific::find($id);
            Storage::delete('public/'.$activity->signature_evidence);
            $dataActivity['signature_evidence']=$request->file('signature_evidence')->store('signatures','public');
            # code...
        }

        $activity = ServiceTaskSpecific::find($id);
        $service = Service::pluck('service_order_id','service_id');
        ServiceTaskSpecific::where('service_id','=',$id) -> update($dataActivity);

        return redirect()->route('service-task-specifics.index')
            ->with('success', 'Activity updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        /*$serviceTaskSpecific = ServiceTaskSpecific::find($id)->delete();

        return redirect()->route('service-task-specifics.index')
            ->with('success', 'ServiceTaskSpecific deleted successfully');*/
        
       $activity = ServiceTaskSpecific::find($id);

        if (Storage::delete('public/'.$activity->previous_evidence)) {
            ServiceTaskSpecific::destroy($id);
        }

        if (Storage::delete('public/'.$activity->subsequent_evidence)) {
            ServiceTaskSpecific::destroy($id);
        }

        if (Storage::delete('public/'.$activity->signature_evidence)) {
            ServiceTaskSpecific::destroy($id);
        }

        return redirect()->route('service-task-specifics.index')
            ->with('success', 'Activity deleted successfully'); 
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
