@extends('layouts.app')

@section('template_title')
    Service
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <!----------------------------------------------------------------------------------->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr style="text-align: center">
                                    <td></td>
                                    <td style="text-align: left"><legend>Customer</legend></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:10%"></td>
                                    <td style="text-align: left">
                                        <b>Name:</b> {{ $service->serviceOrder->ticket->customer->name }}<br>
                                        <b>Contact:</b> {{ $service->serviceOrder->ticket->contact->name }}<br>
                                        <b>Contact's phone:</b> {{ $service->serviceOrder->ticket->contact->phone }}<br>
                                        <b>Customer's phone:</b> {{ $service->serviceOrder->ticket->customer->phone }}<br><br>

                                        
                                        <b></b> <br>
                                        <b></b> 
                                    </td>
                                    <td>
                                        <b>Ticket:</b> {{ $service->serviceOrder->ticket->ticket_id }}<br>
                                        <b>Order:</b> {{ $service->serviceOrder->service_order_id }}<br>
                                        <b>Report:</b>{{ $service->service_id }} <br>
                                        <b>Service Address:</b> {{ $service->serviceOrder->ticket->customer->address }}<br>
                                        <b>Date:</b> {{ \Carbon\Carbon::parse($service->data_service)->format('d/m/Y') }}

                                        <b></b> 
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!----------------------------------------------------------------------------------->
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Reports') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('service-orders.index','id_ticket='.$service->service_id) }}" class="btn btn-primary btn-lg"  data-placement="left">
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
                    <div>
                        <!----------------------->
                        <table class="table table-striped table-hover">
                            <tr style="text-align: left">
                                <td style="width:20%"></td>
                                <td style="width:30%">
                                    <div class="form-group">
                                    <legend>Type of maintenance</legend>
                                        @if ($service->serviceOrder->type_maintenance_id=='1')
                                        {{ Form::radio('type_maintenance_id','1',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','1',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Preventive') }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='2')
                                        {{ Form::radio('type_maintenance_id','2',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','2',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Corrective') }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='3')
                                        {{ Form::radio('type_maintenance_id','3',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','3',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Predictive') }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='4')
                                        {{ Form::radio('type_maintenance_id','4',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','4',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label('Including') }}<br>
                                    </div>
                                </td>
                                <td style="width:30%">
                                    <div class="form-group">
                                    <legend>Type of service</legend><br>
                                        @if ($service->serviceOrder->type_service_id=='1')
                                            {{ Form::radio('type_service_id','1',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','1',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Software') }}<br>
                                        @if ($service->serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','2',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Mechanic') }}<br>
                                        @if ($service->serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','3',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Electronic') }}<br>
                                        @if ($service->serviceOrder->type_service_id=='4')
                                            {{ Form::radio('type_service_id','4',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','4',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Electric') }}<br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <!----------------------->

                        
                    </div>
                    
                    <div>
                    
                        <!--@method('GET')
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                        @method('GET')
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dialogo1">Add</button>-->

                        <div class="modal fade" id="dialogo0">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                <!-- cabecera del diálogo -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Generate Order</h4>
                                    </div>
                                                            
                                <!-- cuerpo del diálogo -->
                                    <div class="modal-body">
                                        Contenido
                                        
                                    </div>
                                                            
                                <!-- pie del diálogo -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="dialogo1">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                    <!-- cabecera del diálogo -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add</h4>
                                        </div>
                                                        
                                    <!-- cuerpo del diálogo -->
                                        <div class="modal-body">
                                            
                                            @foreach ($services as $service)
                                            @endforeach
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('service-reports.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf

                                                    @include('service-report.form2')

                                                </form>
                                            </div>                                                                                            
                                        </div>
                                                        
                                    <!-- pie del diálogo -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                    
                        <div class="modal fade" id="dialogo2">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                    <!-- cabecera del diálogo -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit</h4>
                                        </div>
                                                        
                                    <!-- cuerpo del diálogo -->
                                        <div class="modal-body">
                                            <div class="card-body">
                                                Materials
                                            </div>                                                                                            
                                        </div>
                                                        
                                    <!-- pie del diálogo -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                        <div class="modal fade" id="dialogo3">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                                        
                                    <!-- cabecera del diálogo -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit</h4>
                                        </div>
                                                        
                                    <!-- cuerpo del diálogo -->
                                        <div class="modal-body">
                                            <div class="card-body">
                                                Tools
                                            </div>                                                                                            
                                        </div>
                                                        
                                    <!-- pie del diálogo -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                                        
                                </div>
                            </div>
                        </div> 
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                    </div>

                    <div>
                        <br>
                    </div>

                    <div>
                        <!----------------------->
                        <table class="table table-striped table-hover">
                                
                                <tr style="text-align: center">
                                <tr>
                                    <td>
                                    <legend>Schedule</legend>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        @if($service->status_report_id=='3')

                                        @else
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dialogo1">Add</button>
                                        @endif
                                    </td>
                                </tr>
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th>Time entry</th>
										<th>Time completion</th>
										<th>Time lunchtime</th>
										<th>Service hours</th>
										<th>Service extra</th>
										<th>Duration travel</th>
										<th>Date service</th>
										<th>Service report</th>
										<th>Employee</th>
										<th></th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceReports as $serviceReport)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td>{{ $serviceReport->time_entry }}</td>
											<td>{{ $serviceReport->time_completion }}</td>
											<td>{{ $serviceReport->lunchtime }}</td>
											<td>{{ $serviceReport->service_hours }}</td>
											<td>{{ $serviceReport->service_extras }}</td>
											<td>{{ $serviceReport->duration_travel }}</td>
											<td>{{ $serviceReport->date_service }}</td>
											<td>{{ $serviceReport->service_report_id }}</td>
											<td>{{ $serviceReport->employee->name }}</td>
                                            
                                            <td>
                                            @if($service->status_report_id=='3')

                                            @else
                                                <form action="{{ route('service-reports.destroy',$serviceReport->service_report_id) }}" method="POST">
                                                    <!--<a class="btn btn-sm btn btn-outline-primary" href="{{ route('service-reports.show',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('service-reports.edit',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Do you want to delete service?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <!----------------------->

                        <div>
                        <legend>Materials</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:10%">Key</th>
                                        <th style="width:15%">Name</th>
										<th style="width:15%">Quantity</th>
										<th style="width:15%">Unit of measure</th>
										<th style="width:15%">Stock</th>

                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:10%">{{ $materialAssigned->material->key }}</td>
                                            <td style="width:15%">{{ $materialAssigned->material->name }}</td>
											<td style="width:15%">{{ $materialAssigned->quantity }}</td>
											<td style="width:15%">{{ $materialAssigned->unit_measure }}</td>
											<td style="width:15%">{{ $materialAssigned->material->stock }}</td>
                                            <td style="width:10%">
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo2">Edit</button>
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
                                        
										<th style="width:10%">Key</th>
                                        <th style="width:15%">Name</th>
										<th style="width:15%">Quantity</th>
										<th style="width:15%">Unit of measure</th>
										<th style="width:15%">Stock</th>

                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:10%">{{ $toolAssigned->tool->key }}</td>
                                            <td style="width:15%">{{ $toolAssigned->tool->name }}</td>
											<td style="width:15%">{{ $toolAssigned->quantity }}</td>
											<td style="width:15%">{{ $toolAssigned->unit_measure }}</td>
											<td style="width:15%">{{ $toolAssigned->tool->stock }}</td>
                                            <td style="width:10%">
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo3">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!----------------------->

                        <!----------------------->
                        <div>
                            <div class="card-body">
                            @if ($activity2->isEmpty())
                                <form method="POST" action="{{ route('activities.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('activity.form2')

                                </form>
                            @else
                                <p></p>
                                @foreach($activity2 as $activity)
                                <div class="box box-info padding-1">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <legend>Activities implemented</legend>
                                           
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $activity->description_activity }}</textarea>
                                        </div>
                                        <div>
                                            <legend>Evidence </legend>
                                                <table class=table align="center">
                                                    <tr>
                                                        <td align="center">
                                                            <h5>Before:</h5>

                                                            <div class="form-group">
                                                                <img src="{{ asset('app/public').'/'.$activity->previous_evidence }}" width="200" height="200" alt="">
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <h5>After:</h5>
                                                            <div class="form-group">
                                                                <img src="{{ asset('app/public').'/'.$activity->subsequent_evidence }}" width="200" height="200" alt="">
                                                            </div>
                                                        </td>
                                                        <br>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div>
                                            <legend>Signature Evidence:</legend><br>
                                            <img src="{{  $activity->signature_evidence }}" width="100%" height="300" alt="">
                                        </div>
                                        <div>
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">Executor</legend>
                                                            {{ Form::text('executor', $activity->executor, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50,'disabled', 'style'=>'text-align:center']) }}
                                                            {!! $errors->first('executor', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">Customer</legend>
                                                            {{ Form::text('customer', $activity->customer, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50,'disabled', 'style'=>'text-align:center']) }}
                                                            {!! $errors->first('customer', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            @endif
                            </div>
                        </div>
                        <!----------------------->
                    </div>

                </div>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
