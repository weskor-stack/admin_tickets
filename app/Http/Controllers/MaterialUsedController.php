<?php

namespace App\Http\Controllers;

use App\Models\MaterialUsed;
use App\Models\Service;
use App\Models\Material;
use App\Models\UnitMeasure;
use DB;
use Illuminate\Http\Request;

/**
 * Class MaterialUsedController
 * @package App\Http\Controllers
 */
class MaterialUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialUseds = MaterialUsed::paginate();
        $service = Service::pluck('service_id','service_id');
        return view('material-used.index', compact('materialUseds','service'))
            ->with('i', (request()->input('page', 1) - 1) * $materialUseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materialUsed = new MaterialUsed();
        $material = Material::pluck('key','material_id');
        $service = Service::pluck('service_id','service_id');

        $materials = Material::all();
        $unit_measure = UnitMeasure::all();
        return view('material-used.create', compact('materialUsed','material','service','materials','unit_measure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statement = DB::statement("SET @user_id = 9999");

        request()->validate(MaterialUsed::$rules);

        $materialUsed = request()->except('_token');

        //return response()->json($materialUsed);

        $material_stock = Material::select('stock')
        ->where('material_id', '=', $materialUsed['material_id'])->get();

        $material_stock = preg_replace('/[^0-9]/', '', $material_stock);
        
        $material_stock = (int)$material_stock;

        $materialUsed['quantity'] = (int)$materialUsed['quantity'];
        
        $result2 = $material_stock - $materialUsed['quantity'];

        //return response()->json($materialUsed);

        if ($result2 < 0) {
            return '<script>
                    alert("No hay suficiente material, hay en exixstencia: '.$material_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->back()
            ->with('success', __('Insufficient').' '.'material.');    */        
            
        }else {
            $data = Material::find($materialUsed['material_id']);
            $data->stock=$result2;
            $data->save();
            MaterialUsed::insert($materialUsed);            
            return redirect()->back()
            ->with('success', __('The material') .' '.__('updated successfully'));
        }

        /*MaterialUsed::insert($materialUsed);
        //$materialUsed = MaterialUsed::create($request->all());

        $service = Service::find($materialUsed['service_id']);

        return redirect()->route('services.index','id_ticket='.$service['service_id'])
            ->with('success', __('created successfully'));

        /*return redirect()->route('material-useds.index')
            ->with('success', 'MaterialUsed created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materialUsed = MaterialUsed::find($id);

        return view('material-used.show', compact('materialUsed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materialUsed = MaterialUsed::find($id);

        return view('material-used.edit', compact('materialUsed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MaterialUsed $materialUsed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialUsed $materialUsed)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(MaterialUsed::$rules);

        $materialUseds = request()->except('_token');

        $material_Used = MaterialUsed::find($materialUsed['material_id']);
        //->where('material_id', '=', $materialUsed['material_id'])->get();

        $material_stock = Material::select('stock')
        ->where('material_id', '=', $materialUsed['material_id'])->get();

        $material_stock = preg_replace('/[^0-9]/', '', $material_stock);

        $materialUsed['quantity'] = (int)$materialUseds['quantity'];
        
        $material_stock = (int)$material_stock;

        $result = $material_stock + $material_Used['quantity'];

        $materialUseds['quantity'] = (int)$materialUseds['quantity'];
        
        $result2 = $result - $materialUseds['quantity'];

        //return response()->json($result2);

        if ($result2 < 0) {
            return '<script>
                    alert("No hay suficiente material, hay en exixstencia: '.$material_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->back()
            ->with('success', __('Insufficient').' '.'material.');*/            
            
        }else {
            $data = Material::find($materialUsed['material_id']);
            $data->stock=$result2;
            $data->save();
            $materialUsed->update($request->all());            
            return redirect()->back()
            ->with('success', __('The material') .' '.__('updated successfully'));
        }

        //$materialUsed->update($request->all());

        return redirect()->route('material-useds.index')
            ->with('success', 'MaterialUsed updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        $materialUsed = MaterialUsed::find($id);

        $material_stock = Material::find($materialUsed['material_id']);

        $result = $material_stock['stock'] + $materialUsed['quantity'];

        //return response()->json($materialUsed['material_id']);

        $data = Material::find($materialUsed['material_id']);
        $data->stock=$result;
        $data->save();
        
        $materialUsed = MaterialUsed::find($id)->delete();

        return redirect()->back()
        ->with('success', __('The material') .' '.__('deleted successfully'));
        /*return redirect()->route('material-useds.index')
            ->with('success', 'MaterialUsed deleted successfully');*/
    }
}
