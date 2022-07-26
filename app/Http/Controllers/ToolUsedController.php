<?php

namespace App\Http\Controllers;

use App\Models\ToolUsed;
use App\Models\Tool;
use App\Models\Service;
use DB;
use Illuminate\Http\Request;

/**
 * Class ToolUsedController
 * @package App\Http\Controllers
 */
class ToolUsedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toolUseds = ToolUsed::paginate();

        $service = Service::pluck('service_id','service_id');

        return view('tool-used.index', compact('toolUseds','service'))
            ->with('i', (request()->input('page', 1) - 1) * $toolUseds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toolUsed = new ToolUsed();
        $service = Service::pluck('service_id','service_id');

        $tool = Tool::pluck('key','tool_id');
        $tools = Tool::all();
        return view('tool-used.create', compact('toolUsed','service','tool','tools'));
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

        request()->validate(ToolUsed::$rules);

        $toolUseds = request()->except('_token');

        $tool_stock = Tool::select('stock')
        ->where('tool_id', '=', $toolUseds['tool_id'])->get();

        $tool_stock = preg_replace('/[^0-9]/', '', $tool_stock);
        
        $tool_stock = (int)$tool_stock;

        $toolUseds['quantity'] = (int)$toolUseds['quantity'];
        
        $result2 = $tool_stock - $toolUseds['quantity'];

        //return response()->json($toolUseds['tool_id']);

        if ($result2 < 0) {
            return '<script>
                    alert("No hay suficiente herramienta, hay en exixstencia: '.$tool_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->back()
            ->with('success', __('Insufficient').' '.'material.');      */      
            
        }else {
            $data = Tool::find($toolUseds['tool_id']);
            $data->stock=$result2;
            $data->save();
            ToolUsed::insert($toolUseds);           
            return redirect()->back()
            ->with('success', __('The material') .' '.__('updated successfully'));
        }
        //$toolUsed = ToolUsed::create($request->all());

        /*$service = Service::find($toolUseds['service_id']);

        return redirect()->route('services.index','id_ticket='.$service['service_id'])
            ->with('success', __('created successfully'));

        /*return redirect()->route('tool-useds.index')
            ->with('success', 'ToolUsed created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toolUsed = ToolUsed::find($id);

        return view('tool-used.show', compact('toolUsed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toolUsed = ToolUsed::find($id);

        return view('tool-used.edit', compact('toolUsed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ToolUsed $toolUsed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToolUsed $toolUsed)
    {
        $statement = DB::statement("SET @user_id = 9999");
        request()->validate(ToolUsed::$rules);

        $toolUseds = request()->except('_token');

        $tool_Used = ToolUsed::find($toolUsed['tool_id']);

        //$toolUsed->update($request->all());
        $tool_stock = Tool::select('stock')
        ->where('tool_id', '=', $toolUsed['tool_id'])->get();

        $tool_stock = preg_replace('/[^0-9]/', '', $tool_stock);
        
        $tool_stock = (int)$tool_stock;

        //return response()->json($toolUseds['quantity']);
        if($toolUseds['quantity']==0){
            return '<script>
                    alert("Valor no valido"); 
                    javascript:history.go(-1); 
                </script>';
        }

        $result = $tool_Used['quantity'] + $tool_stock;

        $toolUseds['quantity'] = (int)$toolUseds['quantity'];

        $result2 = $result - $toolUseds['quantity'];

        //return response()->json($result);

        if ($result2 < 0) {
            return '<script>
                    alert("No hay suficiente herramienta, hay en exixstencia: '.$tool_stock.' "); 
                    javascript:history.go(-1); 
                </script>';
            /*return redirect()->back()
            ->with('success', __('Insufficient').' '.'material.');    */        
            
        }else {
            $data = Tool::find($toolUseds['tool_id']);
            $data->stock=$result2;
            $data->save();
            $toolUsed->update($request->all());            
            return redirect()->back()
            ->with('success', __('The tool') .' '.__('updated successfully'));
        }

        /*return redirect()->route('tool-useds.index')
            ->with('success', 'ToolUsed updated successfully');*/
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statement = DB::statement("SET @user_id = 9999");
        $toolUsed = ToolUsed::find($id);

        $tool_stock = Tool::find($toolUsed['tool_id']);

        $result = $tool_stock['stock'] + $toolUsed['quantity'];

        $data = Tool::find($toolUsed['tool_id']);
        $data->stock=$result;
        $data->save();

        $toolUsed = ToolUsed::find($id)->delete();

        return redirect()->back()
        ->with('success', __('The tool').' '.__('deleted successfully'));

        /*return redirect()->route('tool-useds.index')
            ->with('success', 'ToolUsed deleted successfully');*/
    }
}
