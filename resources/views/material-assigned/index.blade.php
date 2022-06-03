@extends('layouts.app')

@section('template_title')
    Material Assigned
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Material Assigned') }}
                            </span>

                             <div class="float-right">
                                <!--<a href="{{ route('material-assigneds.create') }}" class="btn btn-primary btn-lg"  data-placement="left">
                                  {{ __('Add material') }}
                                </a>-->
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
                                    <tr style="text-align: center">
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
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $materialAssigned->material->key }}</td>
											<td>{{ $materialAssigned->quantity }}</td>
											<td>{{ $materialAssigned->unit_measure }}</td>
											<td>{{ $materialAssigned->usage }}</td>
											<td>{{ $materialAssigned->serviceOrder->ticket->customer->name }}</td>

                                            <td>
                                                <form action="{{ route('material-assigneds.destroy',$materialAssigned->material_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('material-assigneds.show',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('material-assigneds.edit',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $materialAssigneds->links() !!}
            </div>
        </div>
    </div>
@endsection
