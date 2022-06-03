@extends('layouts.app')

@section('template_title')
    Tool Assigned
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Tools') }}
                            </span>

                             <div class="float-right">
                                <!--<a href="{{ route('tool-assigneds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva Herramienta') }}-->
                                </a>
                                <a href="{{ route('service-orders.index') }}" class="btn btn-primary btn-lg"  data-placement="left">
                                  {{ __('Back') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Key</th>
										<th>Quantity</th>
										<th>Unit measure</th>
										<th>Usage</th>
										<th>Service order</th>
										<th>Action</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $toolAssigned->tool->key }}</td>
											<td>{{ $toolAssigned->quantity }}</td>
											<td>{{ $toolAssigned->unit_measure }}</td>
											<td>{{ $toolAssigned->usage }}</td>
											<td>{{ $toolAssigned->serviceOrder->ticket->customer->name }}</td>

                                            <td>
                                                <form action="{{ route('tool-assigneds.destroy',$toolAssigned->tool_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('tool-assigneds.show',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('tool-assigneds.edit',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $toolAssigneds->links() !!}
            </div>
        </div>
    </div>
@endsection
