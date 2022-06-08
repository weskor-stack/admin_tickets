<?php

namespace App\Http\Controllers;

use App\Models\ToolAssigned;
use App\Models\Tool;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

/**
 * Class ToolAssignedController
 * @package App\Http\Controllers
 */
class ToolAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toolAssigneds = ToolAssigned::paginate();

        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');

        return view('tool-assigned.index', compact('toolAssigneds','serviceOrder'))
            ->with('i', (request()->input('page', 1) - 1) * $toolAssigneds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toolAssigned = new ToolAssigned();
        $serviceOrder = ServiceOrder::pluck('service_order_id','service_order_id');
        $tool = Tool::pluck('key','tool_id');
        $tools = Tool::all();
        return view('tool-assigned.create', compact('toolAssigned','tool','serviceOrder','tools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ToolAssigned::$rules);

        $dataTool = request()->except('_token');
        
        /*$url = redirect()->getUrlGenerator()->previous();
        $components = parse_url($url);
        parse_str($components['query'], $results);
        //echo($results['id']);
        $dataTool['service_order_id']=$results['order'];*/

        //ToolAssigned::insert($dataTool);

        //$toolAssigned = ToolAssigned::create($request->all());

        $reports2 = ServiceOrder::select('ticket_id')
        ->where('service_order_id', '=', $dataTool['service_order_id'])->get();

        $reports2 = preg_replace('/[^0-9]/', '', $reports2);

        $tool = Tool::select('unit_measure')
        ->where('tool_id', '=', $dataTool['tool_id'])->get();

        $tool = explode('"',$tool);

        $dataTool ['unit_measure'] = $tool[3];

        $tool_stock = Tool::select('stock')
        ->where('tool_id', '=', $dataTool['tool_id'])->get();

        $dataTool['quantity'] = (int)$dataTool['quantity'];
        
        $tool_stock = preg_replace('/[^0-9]/', '', $tool_stock);
        
        $tool_stock = (int)$tool_stock;
        
        $result = $tool_stock - $dataTool['quantity'];

        if ($result >= 0) {
            //return response()->json($result);
            
            ToolAssigned::insert($dataTool);

            $data = Tool::find($dataTool['tool_id']);
            $data->stock=$result;
            $data->save();

            return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', 'Tool assigned created successfully ');
            
        }else {
            return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', 'Insufficient tools. Stock = '.$tool_stock);
        }

        //return response()->json($result);

        return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', 'ToolAssigned created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toolAssigned = ToolAssigned::find($id);

        return view('tool-assigned.show', compact('toolAssigned'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toolAssigned = ToolAssigned::find($id);
        $order = ServiceOrder::pluck('service_order_id','service_order_id');
        $tool = Tool::pluck('key','tool_id');
        $tools = Tool::all();
        return view('tool-assigned.edit', compact('toolAssigned','order','tool','tools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ToolAssigned $toolAssigned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToolAssigned $toolAssigned)
    {
        request()->validate(ToolAssigned::$rules);

        $tool_stock = Tool::select('stock')
        ->where('tool_id', '=', $toolAssigned['tool_id'])->get();

        $tool_stock = preg_replace('/[^0-9]/', '', $tool_stock);
        
        $tool_stock = (int)$tool_stock;

        $toolAssigned['quantity'] = (int)$toolAssigned['quantity'];

        $data_toolAssigned = $toolAssigned['quantity'];

        $result = $tool_stock + $data_toolAssigned;

        $toolAssigned->update($request->all());

        $toolAssigned['quantity'] = (int)$toolAssigned['quantity'];

        $result2 = $result - $toolAssigned['quantity'];

        //return response()->json($result2);

        $serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);

        if ($result2 >= 0) {
            
            $data = Tool::find($toolAssigned['tool_id']);
            $data->stock=$result2;
            $data->save();

            //return redirect()->route('service-orders.index','id_ticket='.$reports2)
            return redirect()->back()
            ->with('success', 'Tool assigned updated successfully.');
            
        }else {
            $toolAssigned->quantity=$data_toolAssigned;
        
            $toolAssigned->save();
            //return response()->json($materialAssigned);
            //return redirect()->route('service-orders.index','id_ticket='.$reports2)
            return redirect()->back()
            ->with('success', 'Insufficient tools.');
        }

        return redirect()->route('tool-assigneds.index')
            ->with('success', 'ToolAssigned updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceOrder = ServiceOrder::find($id);

        //$toolAssigned = ToolAssigned::find($id)->delete();
        $toolAssigned = ToolAssigned::find($id);

        //return response()->json($toolAssigned);

        $tool_stock = Tool::select('stock')
        ->where('tool_id', '=', $toolAssigned['tool_id'])->get();

        $toolAssigned['quantity'] = (int)$toolAssigned['quantity'];
        
        $tool_stock = preg_replace('/[^0-9]/', '', $tool_stock);
        
        $tool_stock = (int)$tool_stock;
        
        $result = $tool_stock + $toolAssigned['quantity'];

        $data = Tool::find($toolAssigned['tool_id']);
        $data->stock=$result;
        $data->save();

        $toolAssigned = ToolAssigned::find($id)->delete();
        //return response()->json($result);

        $serviceOrder = ServiceOrder::select('service_order_id')->get();

        $reports2 = preg_replace('/[^0-9]/', '', $serviceOrder);

        return redirect()->route('service-orders.index','id_ticket='.$reports2)
            ->with('success', 'Tool assigned deleted successfully');
    }
}
