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
                                    <td style="text-align: left"><legend>{{ __('Customer')}}</legend></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:10%"></td>
                                    <td style="text-align: left">
                                        <b>{{ __('Name') }}:</b> {{ $service->serviceOrder->ticket->customer->name }}<br>
                                        <b>{{ __('Contact') }}:</b> {{ $service->serviceOrder->ticket->contact->name }}<br>
                                        <b>{{ __('Contacts phone') }}:</b> {{ $service->serviceOrder->ticket->contact->phone }}<br>
                                        <b>{{ __('Customers phone') }}:</b> {{ $service->serviceOrder->ticket->customer->phone }}<br><br>

                                        
                                        <b></b> <br>
                                        <b></b> 
                                    </td>
                                    <td>
                                        <b>{{ __('Ticket') }}:</b> {{ $service->serviceOrder->ticket->ticket_id }}<br>
                                        <b>{{ __('Order') }}:</b> {{ $service->serviceOrder->service_order_id }}<br>
                                        <!--b>{{ __('Report') }}:</b>{{ $service->service_id }} <br>-->
                                        <b>{{ __('Service Address') }}:</b> {{ $service->serviceOrder->ticket->customer->address }}<br>
                                        <b>{{ __('Date') }}:</b> {{ \Carbon\Carbon::parse($service->data_service)->format('d/m/Y') }}

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
                                <a href="{{ route('service-orders.index','id_ticket='.$service->serviceOrder->ticket_id) }}" class="btn btn-primary btn-lg"  data-placement="left">
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
                                        {{ Form::label(__('Preventive')) }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='2')
                                        {{ Form::radio('type_maintenance_id','2',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','2',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label( __('Corrective')) }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='3')
                                        {{ Form::radio('type_maintenance_id','3',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','3',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label( __('Predictive')) }}<br>
                                        @if ($service->serviceOrder->type_maintenance_id=='4')
                                        {{ Form::radio('type_maintenance_id','4',true,array('disabled')) }}
                                        @else
                                        {{ Form::radio('type_maintenance_id','4',false,array('disabled')) }}
                                        @endif
                                        {{ Form::label( __('Including')) }}<br>
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
                                            {{ Form::label( __('Software')) }}<br>
                                        @if ($service->serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','2',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label( __('Mechanic')) }}<br>
                                        @if ($service->serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','3',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label( __('Electronic')) }}<br>
                                        @if ($service->serviceOrder->type_service_id=='4')
                                            {{ Form::radio('type_service_id','4',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','4',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label( __('Electric')) }}<br>
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
                                        <h4 class="modal-title">{{ __('Generate Order')}}</h4>
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
                                            <h4 class="modal-title">{{ __('Add')}}</h4>
                                        </div>
                                                        
                                    <!-- cuerpo del diálogo -->
                                        <div class="modal-body">
                                            
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('service-reports.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf

                                                    @include('service-report.form2')

                                                </form>
                                            </div>                                                                                            
                                        </div>
                                                        
                                    <!-- pie del diálogo -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
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
                                    <legend>{{ __('Schedule')}}</legend>
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
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dialogo1">{{ __('Add')}}</button>
                                        @endif
                                    </td>
                                </tr>
                                    <tr style="text-align: center">
                                        <th>No</th>
                                        
										<th>{{ __('Time entry')}}</th>
										<th>{{ __('Completion')}}</th>
										<th>{{ __('Lunchtime')}}</th>
										<th>{{ __('Service hour')}}</th>
										<th>{{ __('Service extra')}}</th>
										<th>{{ __('Duration travel')}}</th>
										<th>{{ __('Date service')}}</th>
										<th hidden>{{ __('Service report')}}</th>
										<th>{{ __('Employee')}}</th>
										<th></th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceReports as $serviceReport)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviceReport->time_entry }}</td>
											<td>{{ $serviceReport->time_completion }}</td>
											<td>{{ $serviceReport->lunchtime }}</td>
											<td>{{ $serviceReport->service_hours }} horas</td>
											<td>{{ $serviceReport->service_extras }}</td>
											<td>{{ $serviceReport->duration_travel }}</td>
											<td>{{ \Carbon\Carbon::parse($serviceReport->date_service)->format('d/m/Y') }}</td> 
											<td hidden>{{ $serviceReport->service_report_id }}</td>
											<td >{{ $serviceReport->employee->name }} {{ $serviceReport->employee->last_name }}</td>
                                            
                                            <td>
                                            @if($service->status_report_id=='3')

                                            @else
                                                <form action="{{ route('service-reports.destroy',$serviceReport->service_report_id) }}" method="POST">
                                                    <!--<a class="btn btn-sm btn btn-outline-primary" href="{{ route('service-reports.show',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('service-reports.edit',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Do you want to delete service?')"><i class="fa fa-fw fa-trash"></i> {{ __('Delete')}}</button>
                                                </form>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <br>
                        <!----------------------->
                        <h1 style="text-align:center;">{{ __('Items to use') }}</h1>
                        <div>
                        <legend>{{ __('Materials')}}</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:20%">{{ __('Key')}}</th>
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										<th style="width:20%" hidden>{{ __('Stock')}}</th>

                                        <th style="width:20%" hidden></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:20%">{{ $materialAssigned->material->key }}</td>
                                            <td style="width:20%">{{ $materialAssigned->material->name }}</td>
											<td style="width:20%">{{ $materialAssigned->quantity }}</td>
											<td style="width:20%">{{ $materialAssigned->material->unitMeasure->name }}</td>
											<td style="width:20%" hidden>{{ $materialAssigned->material->stock }}</td>
                                            <td style="width:20%" hidden>
                                            @if($service->status_report_id=='3')

                                            @else
                                                <button type="button" class="btn btn-outline-success" href="#" data-toggle="modal" data-target="#dialogo7{{ $materialAssigned->material_id }}"> {{ __('Edit') }}</button>
                                            @endif
                                            </td>
                                            @include('service-order.modal.edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <legend>{{ __('Tools')}}</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:20%">{{ __('Key')}}</th>
                                        <th style="width:20%">{{ __('Name')}}</th>
										<th style="width:20%">{{ __('Quantity')}}</th>
										<th style="width:20%">{{ __('Unit of measure')}}</th>
										<th style="width:20%" hidden>{{ __('Stock')}}</th>

                                        <th style="width:20%" hidden></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
											<td style="width:20%">{{ $toolAssigned->tool->key }}</td>
                                            <td style="width:20%">{{ $toolAssigned->tool->name }}</td>
											<td style="width:20%">{{ $toolAssigned->quantity }}</td>
											<td style="width:20%">{{ $toolAssigned->tool->unitMeasure->name }}</td>
											<td style="width:20%" hidden>{{ $toolAssigned->tool->stock }}</td>
                                            <td style="width:20%" hidden>
                                            @if($service->status_report_id=='3')

                                            @else
                                                <button type="button" class="btn btn-outline-success" href="#" data-toggle="modal" data-target="#dialogo8{{ $toolAssigned->tool_id }}"> {{ __('Edit') }}</button>
                                            @endif
                                            </td>
                                            @include('service-order.modal.tool_edit')
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!----------------------->
                        <h1 style="text-align:center;">{{ __('Add items') }}</h1>

                        <!----------------------->
                        <div>
                            <div class="card-body">
                            @if ($activity2->isEmpty())
                                <form method="POST" action="{{ route('service-task-specifics.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    @include('service-task-specific.form')

                                </form>
                            @else
                                <p></p>
                                @foreach($activity2 as $activity)
                                <div class="box box-info padding-1">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <legend>{{ __('Activities implemented')}}</legend>
                                           
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $activity->description_task }}</textarea>
                                        </div>
                                        <div>
                                            <legend>{{ __('Evidence') }} </legend>
                                                <table class=table align="center">
                                                    <tr>
                                                        <td align="center">
                                                            <h5>{{ __('Before')}}:</h5>

                                                            <div class="form-group">
                                                                <img src="{{ asset('app/public').'/'.$activity->previous_evidence }}" width="200" height="200" alt="">
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <h5>{{ __('After') }}:</h5>
                                                            <div class="form-group">
                                                                <img src="{{ asset('app/public').'/'.$activity->subsequent_evidence }}" width="200" height="200" alt="">
                                                            </div>
                                                        </td>
                                                        <br>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div>
                                            <legend>{{ __('Signature') }}:</legend><br>
                                            <img src="{{  $activity->signature_evidence }}" width="100%" height="300" alt="">
                                        </div>
                                        <div>
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">{{ __('Executor')}}</legend>
                                                            <!--{{ Form::text('employee_id', $activity->employee->name, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50,'disabled', 'style'=>'text-align:center','required']) }}-->
                                                            <input type="text" class="form-control" style="text-align:center;" name="employee_id" id="employee_id" value="{{ $activity->employee->name }} {{ $activity->employee->last_name }}" disabled>
                                                            <!--{!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <legend style="text-align:center">{{ __('Contact')}}</legend>
                                                            <!--{{ Form::text('contact_id', $activity->contact->name, ['class' => 'form-control' . ($errors->has('contact_id') ? ' is-invalid' : ''), 'placeholder' => 'Descripción del servicio', 'maxlength' => 50,'disabled', 'style'=>'text-align:center','required']) }}
                                                            {!! $errors->first('contact_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                                            <input type="text" class="form-control" style="text-align:center;" name="contact_id" id="contact_id" value="{{ $activity->contact->name }} {{ $activity->contact->last_name }}" disabled>
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
