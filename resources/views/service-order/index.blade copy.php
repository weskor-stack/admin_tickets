@extends('layouts.app')

@section('template_title')
    Service Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Order of service') }}
                            </span>

                            <!--<div class="float-right">
                                <a href="{{ route('service-orders.create') }}" class="btn btn-primary"  data-placement="left">
                                  {{ __('Create Order') }}
                                </a>
                              </div>-->
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
                                        
										<th>Order date</th>
										<th>Ticket</th>
										<th>Maintenance type</th>
										<th>Service type</th>
										<th>Order status</th>
										<th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceOrders as $serviceOrder)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviceOrder->date_order }}</td>
											<td>{{ $serviceOrder->ticket->customer->name }}</td>
											<td>{{ $serviceOrder->typemaintenance->name }}</td>
											<td>{{ $serviceOrder->typeservice->name }}</td>
											<td>{{ $serviceOrder->orderstatus->name }}</td>

                                            <td>
                                                <form action="{{ route('service-orders.destroy',$serviceOrder->service_order_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('service-orders.show',$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    @if($serviceOrder->status_order_id=='3')
                                                    <a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1" hidden>Material</button>
                                                    <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                    <a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Tools</a>
                                                    <a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Add employee</a>
                                                    @else
                                                    <a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                    @method('GET')
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                                    @method('GET')
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1">Material</button>
                                                    @method('GET')
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo2">Tool</button>
                                                    
                                                    <!---->   
                                                    <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Tools</a>-->
                                                    @method('GET')
                                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo3">Add employee</button>
                                                    <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Add employee</a>-->
                                                    @endif

                                                    @if($serviceOrder->status_order_id=='1')
                                                        <a href="{{ route('services.create','id='.$serviceOrder->service_order_id) }}" class="btn btn-outline-warning"  data-placement="left">{{ __('Create report') }}</a>
                                                    @else
                                                        <a href="{{ route('services.create','id='.$serviceOrder->service_order_id) }}" class="btn btn-outline-warning"  data-placement="left" hidden>{{ __('Create report') }}</a>
                                                    @endif
                                                    
                                                    <a type="submit" class="btn btn-outline-info" href="{{ route('services.index') }}"><i class="fa fa-fw fa-trash"></i> Show reports</a>
                                                    
                                                    <div>
                                                        

                                                        <div class="modal fade" id="dialogo0">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Add material</h4>
                                                                <button type="button" class="close" data-dismiss="modal">X</button>
                                                            </div>

                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('material-assigned.form')

                                                                    </form>
                                                                </div>                                                            
                                                            </div>

                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div>
                                                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    </div>
                                                   
                                                    <div>
                                                        

                                                        <div class="modal fade" id="dialogo1">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Add material</h4>
                                                                <button type="button" class="close" data-dismiss="modal">X</button>
                                                            </div>

                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('material-assigned.form')

                                                                    </form>
                                                                </div>                                                            
                                                            </div>

                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div>
                                                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    </div>

                                                    <div>
                                                        

                                                        <div class="modal fade" id="dialogo2">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Add tool</h4>
                                                                <button type="button" class="close" data-dismiss="modal">X</button>
                                                            </div>

                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('tool-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('tool-assigned.form')

                                                                    </form>
                                                                </div>                                                            
                                                            </div>
                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div>
                                                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    </div>

                                                    <div>
                                                        

                                                        <div class="modal fade" id="dialogo3">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Add employee</h4>
                                                                <button type="button" class="close" data-dismiss="modal">X</button>
                                                            </div>

                                                            <!-- cuerpo del diálogo -->
                                                            <div class="modal-body">
                                                                
                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('employee-orders.store') }}"  role="form" enctype="multipart/form-data">
                                                                        @csrf

                                                                        @include('employee-order.form')

                                                                    </form>
                                                                </div>                                                            
                                                            </div>

                                                            <!-- pie del diálogo -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>

                                                            </div>
                                                        </div>
                                                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                    </div>

                                                </form>
                                                <br>                                                                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!----------------------->
                            <table class="table table-striped table-hover">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                        <legend>Type of maintenance</legend>
                                        @if ($serviceOrder->type_maintenance_id=='1')
                                        {{ Form::radio('type_maintenance_id','1',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','1',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Preventive') }}<br>
                                        @if ($serviceOrder->type_maintenance_id=='2')
                                        {{ Form::radio('type_maintenance_id','2',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','2',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Corrective') }}<br>
                                        @if ($serviceOrder->type_maintenance_id=='3')
                                        {{ Form::radio('type_maintenance_id','3',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','3',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Predictive') }}<br>
                                        @if ($serviceOrder->type_maintenance_id=='4')
                                        {{ Form::radio('type_maintenance_id','4',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','4',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Including') }}<br>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {{ Form::label('Type of service:') }}<br>
                                            @if ($serviceOrder->type_service_id=='1')
                                            {{ Form::radio('type_service_id','1',true) }}
                                            @else
                                            {{ Form::radio('type_service_id','1') }}
                                            @endif
                                            {{ Form::label('Software') }}<br>
                                            @if ($serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true) }}
                                            @else
                                            {{ Form::radio('type_service_id','2') }}
                                            @endif
                                            {{ Form::label('Mechanic') }}<br>
                                            @if ($serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true) }}
                                            @else
                                            {{ Form::radio('type_service_id','3') }}
                                            @endif
                                            {{ Form::label('Electronic') }}<br>
                                            @if ($serviceOrder->type_service_id=='4')
                                            {{ Form::radio('type_service_id','4',true) }}
                                            @else
                                            {{ Form::radio('type_service_id','4') }}
                                            @endif
                                            {{ Form::label('Electric') }}<br>
                                            <!--{{ Form::select('type_service_id', $service, $serviceOrder->type_service_id, ['class' => 'form-control' . ($errors->has('type_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de servicio']) }}
                                            {!! $errors->first('type_service_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!----------------------->
                                                        
                            <legend>Materials</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th>Key</th>
										<th>Quantity</th>
										<th>Unit of measure</th>
										<th>Usage</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td>{{ $materialAssigned->material->key }}</td>
											<td>{{ $materialAssigned->quantity }}</td>
											<td>{{ $materialAssigned->unit_measure }}</td>
											<td>{{ $materialAssigned->usage }}</td>

                                            <td>
                                                <form action="{{ route('material-assigneds.destroy',$materialAssigned->material_id) }}" method="POST">
                                                    <!--<a class="btn btn-outline-primary" href="{{ route('material-assigneds.show',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('material-assigneds.edit',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <legend>Tools</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th>Key</th>
										<th>Quantity</th>
										<th>Unit of measure</th>
										<th>Usage</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td>{{ $toolAssigned->tool->key }}</td>
											<td>{{ $toolAssigned->quantity }}</td>
											<td>{{ $toolAssigned->unit_measure }}</td>
											<td>{{ $toolAssigned->usage }}</td>

                                            <td>
                                                <form action="{{ route('tool-assigneds.destroy',$toolAssigned->tool_id) }}" method="POST">
                                                    <!--<a class="btn btn-outline-primary" href="{{ route('tool-assigneds.show',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <legend>Employees</legend>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            
                                            <th>Order</th>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Actions</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employeeOrders as $employeeOrder)
                                            <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                                <td>{{ $employeeOrder->employee->employee_id }}</td>
                                                
                                                <td>{{ $employeeOrder->service_order_id }}</td>
                                                <td>{{ $employeeOrder->employee->name }}</td>
                                                <td>{{ $employeeOrder->employee->department->name }}</td>

                                                <td>
                                                    <form action="{{ route('employee-orders.destroy',$employeeOrder->employee_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('employee-orders.show',$employeeOrder->employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-outline-success" href="{{ route('employee-orders.edit',$employeeOrder->employee_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete employee?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $serviceOrders->links() !!}
            </div>
        </div>
    </div>
@endsection
