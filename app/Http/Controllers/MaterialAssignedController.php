<?php

namespace App\Http\Controllers;

use App\Models\MaterialAssigned;
use App\Models\ServiceOrder;
use App\Models\Material;
use App\Models\UnitMeasure;
use DB;
use Illuminate\Http\Request;

/**
 * Class MaterialAssignedController
 * @package App\Http\Controllers
 */
class MaterialAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialAssigneds = MaterialAssigned::paginate();

        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        return view('material-assigned.index', compact('materialAssigneds','serviceOrder'))
            ->with('i', (request()->input('page', 1) - 1) * $materialAssigneds->perPage(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materialAssigned = new MaterialAssigned();
        $material = Material::pluck('key','material_id');
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');
        /*$material = Material::select(DB::raw("CONCAT(key,' ',name) as full_name"))
        ->get()->pluck('full_name');*/
        $materials = Material::all();
        $unit_measure = UnitMeasure::all();
        //select('unit_measure_id', 'name', 'abbreviation', 'user_id', 'date_registration')
        //->where('unit_measure_id', '=', '1')->get();
        return view('material-assigned.create', compact('materialAssigned','material','serviceOrder','materials','unit_measure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MaterialAssigned::$rules);
        $statement = DB::statement("SET @user_id = 9999");

        $dataMaterial = request()->except('_token');

        //return response()->json($dataMaterial);

        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        
        $dataMaterial['service_order_id']=$results['id_ticket'];*/

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $dataMaterial['service_order_id'])->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        //return response()->json($reports2);
        $material = Material::select('unit_measure_id')
        ->where('material_id', '=', $dataMaterial['material_id'])->get();
        
        $material = explode('"',$material);
        $material = preg_replace('/[^0-9]/', '', $material);
        
        //$dataMaterial ['unit_measure'] = $material[3];
        
        $material_stock = Material::select('stock')
        ->where('material_id', '=', $dataMaterial['material_id'])->get();

        $dataMaterial['quantity'] = (int)$dataMaterial['quantity'];
        
        $material_stock = preg_replace('/[^0-9]/', '', $material_stock);
        
        $material_stock = (int)$material_stock;
        
        $result = $material_stock - $dataMaterial['quantity'];

        if ($result >= 0) {
            //return response()->json($result);
            
            MaterialAssigned::insert($dataMaterial);

            /*$data = Material::find($dataMaterial['material_id']);
            $data->stock=$result;
            $data->save();*/

            return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', __('Material created successfully'));
            
        }else {

            return '<script>
                    alert("No hay suficiente material, hay en exixstencia: '.$material_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', __('Insufficient').' '.'material.');*/
        }

        //return response()->json("No entra al if");
        

        //$materialAssigned = MaterialAssigned::create($request->all());

        /*return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', 'Material'.' '.__('created successfully'));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materialAssigned = MaterialAssigned::find($id);

        return view('material-assigned.show', compact('materialAssigned'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialAssigned = MaterialAssigned::find($id);
        $material = Material::pluck('key','material_id');
        /*$material = Material::select(DB::raw("CONCAT(key,' ',name) as full_name"))
        ->get()->pluck('full_name');*/
        $materials = Material::all();
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');
        return view('material-assigned.edit', compact('materialAssigned','material','serviceOrder','materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaterialAssigned $materialAssigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialAssigned $materialAssigned)
    {
        request()->validate(MaterialAssigned::$rules);
        $statement = DB::statement("SET @user_id = 9999");
        $materialAssigneds = request()->except('_token');
        //return response()->json($materialAssigneds);

        $material_stock = Material::select('stock')
        ->where('material_id', '=', $materialAssigned['material_id'])->get();

        $material_stock = preg_replace('/[^0-9]/', '', $material_stock);
        
        $material_stock = (int)$material_stock;

        $materialAssigned['quantity'] = (int)$materialAssigned['quantity'];

        $data_materialAssigned = $materialAssigned['quantity'];

        $result = $material_stock + $data_materialAssigned;

        //$materialAssigned->update($request->all());

        $materialAssigned['quantity'] = (int)$materialAssigned['quantity'];

        $result2 = $material_stock - $materialAssigneds['quantity'];
        
        $serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);

        if ($result2 < 0) {
            
            //return response()->json($materialAssigned['material_id']);
            /*$data = Material::find($materialAssigned['material_id']);
            $data->stock=$result2;
            $data->save();*/

            //return redirect()->route('service-orders.index','id_ticket='.$reports2)
            return '<script>
                    alert("No hay suficiente material, hay en exixstencia: '.$material_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->back()
            ->with('success', __('Insufficient').' '.'material.'); */           
            
        }else {
            //$materialAssigned->quantity=$data_materialAssigned;
        
            //$materialAssigned->save();
            $materialAssigned->update($request->all());
            //return response()->json($materialAssigned);
            //return redirect()->route('service-orders.index','id_ticket='.$reports2)
            return redirect()->back()
            ->with('success', __('The material') .' '.__('updated successfully'));
        }

        /*return redirect()->route('service-orders.index','id_ticket='.$materialAssigneds->service_order_id)
            ->with('success', 'MaterialAssigned updated successfully');*/
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //$serviceOrder = ServiceOrder::find($id);
        $statement = DB::statement("SET @user_id = 9999");
        //$materialAssigned = MaterialAssigned::find($id)->delete();
        $materialAssigned = MaterialAssigned::find($id);

        /*$material_stock = Material::select('stock')
        ->where('material_id', '=', $materialAssigned['material_id'])->get();

        $materialAssigned['quantity'] = (int)$materialAssigned['quantity'];
        
        $material_stock = preg_replace('/[^0-9]/', '', $material_stock);
        
        $material_stock = (int)$material_stock;
        
        $result = $material_stock + $materialAssigned['quantity'];*/

        $serviceOrder = $materialAssigned->service_order_id;

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $serviceOrder)->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        //return response()->json($reports2);

        //return response()->json($serviceOrder);

        /*$data = Material::find($materialAssigned['material_id']);
        $data->stock=$result;
        $data->save();*/

        //return response()->json($result);

        $materialAssigned = MaterialAssigned::find($id)->delete();

        /*$serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);*/
        
        return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', __('The material') .' '.__('deleted successfully'));
    }
}
