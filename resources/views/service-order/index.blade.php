@extends('layouts.app')

@section('template_title')
    Service Order
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!--------------------------------------------------------------------->
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
                                <tr>
                                    <td style="width:10%"></td>
                                    <td style="text-align: left">
                                        <b>Name:</b> {{ $serviceOrder->ticket->customer->name }}<br>
                                        <b>Contact:</b> {{ $serviceOrder->ticket->contact->name }}<br>
                                        <b>Contact's phone:</b> {{ $serviceOrder->ticket->contact->phone }}<br>
                                        <b>Customer's phone:</b> {{ $serviceOrder->ticket->customer->phone }}<br><br>

                                        <b>Service Address:</b> {{ $serviceOrder->ticket->customer->address }}<br>
                                        <b>Date:</b> {{ $serviceOrder->date_order }}
                                    </td>
                                    <td>
                                        <b>Ticket:</b> {{ $serviceOrder->ticket->ticket_id }}<br>
                                        <b>Order:</b> {{ $serviceOrder->service_order_id }}<br>
                                        <b></b> <br>
                                        <b></b><br><br>

                                        <b></b> <br>
                                        <b></b> 
                                    </td>
                                    <td>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <form action="{{ route('service-orders.destroy',$serviceOrder->service_order_id) }}" method="POST">
                                            <!--<a class="btn btn-outline-primary" href="{{ route('service-orders.show',$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                            @if($serviceOrder->status_order_id=='3')
                                                <a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1" hidden>Material</button>
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                <a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Tools</a>
                                                <a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->service_order_id) }}" hidden><i class="fa fa-fw fa-trash"></i> Add employee</a>
                                            @else
                                                <!--<a class="btn btn-outline-success" href="{{ route('service-orders.edit',$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('material-assigneds.create', 'order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Material</a>-->
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo0" hidden>Show</button>
                                                <!--@method('GET')
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo4" >Edit</button>-->
                                                <!--@method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1">Material</button>-->
                                                <!---->   
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('tool-assigneds.create', 'order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Tools</a>-->
                                                                            
                                                <!--<a type="submit" class="btn btn-outline-secondary" href="{{ route('employee-orders.create','order='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Add employee</a>-->
                                            @endif

                                            @if($serviceOrder->status_order_id=='1')
                                                <!--<a href="{{ route('services.create','id='.$serviceOrder->service_order_id) }}" class="btn btn-outline-warning"  data-placement="left">{{ __('Create report') }}</a>-->
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#dialogo5">{{ __('Create report') }}</button>
                                            @else
                                                <a href="{{ route('services.create','id='.$serviceOrder->service_order_id) }}" class="btn btn-outline-warning"  data-placement="left" hidden>{{ __('Create report') }}</a>
                                                <a type="submit" class="btn btn-outline-info" href="{{ route('services.index','id_ticket='.$serviceOrder->service_order_id) }}"><i class="fa fa-fw fa-trash"></i> Show reports</a>
                                            @endif                    
                                                                            
                                            <div>                                                                                

                                                <div class="modal fade" id="dialogo0">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add material</h4>
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
                                                
                                                <div class="modal fade" id="dialogo1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add material</h4>
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf

                                                                            @include('material-assigned.form')
                                                                        </form>
                                                                        <!--<script>
                                                                            var value_input;
                                                                            $('select').on('change', function() {
                                                                                var data = this.value;
                                                                                /*document.getElementById("text1").value = data;
                                                                                const contenido = document.getElementById("text1").value;
                                                                                //alert(contenido);*/
                                                                                value_input = data;
                                                                                alert( "Unit measure: " + data );
                                                                            });
                                                                        </script>-->
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
                                                        
                                                <div class="modal fade" id="dialogo2">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add tool</h4>
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

                                                <div class="modal fade" id="dialogo3">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">

                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Add employee</h4>            
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
                                                    
                                                <div class="modal fade" id="dialogo4">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit</h4>
                                                                </div>
                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('service-orders.update', $serviceOrder->service_order_id) }}"  role="form" enctype="multipart/form-data">
                                                                            {{ method_field('PATCH') }}
                                                                            @csrf
                                                                            @include('service-order.form')
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
                                                    
                                                <div class="modal fade" id="dialogo5">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Create report</h4>                
                                                                </div>

                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <p style="text-align:center">Do you want create a report?</p>
                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('services.store') }}"  role="form" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @include('service.form')
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            
                                                            <!-- pie del diálogo -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                </div> 
                                                
                                                <div class="modal fade" id="dialogo6">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- cabecera del diálogo -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit</h4>
                                                                </div>
                                                            <!-- cuerpo del diálogo -->
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                    {{$materialAssigneds_2}}
                                                                        <form method="POST" action="{{ route('material-assigneds.update', $materialAssigned->material_assigned_id) }}"  role="form" enctype="multipart/form-data">
                                                                            {{ method_field('PATCH') }}
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

                                            </form>
                                            <br>                                                                                                
                                        </td>
                                    </tr>
                                    
                        </table>
                    </div>
                    <!--------------------------------------------------------------------->
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Order of service') }}
                            </span>

                            <div class="float-right">
                                
                                <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-lg"  data-placement="left">
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
                        <!---->
                            <table class="table table-striped table-hover">
                                <tr style="text-align: left">
                                    <td style="width:30%"></td>
                                    <td style="width:30%">
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
                                    <td style="width:30%">
                                        <div class="form-group">
                                        <legend>Type of service</legend>
                                            
                                            @if ($serviceOrder->type_service_id=='1')
                                            {{ Form::radio('type_service_id','1',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','1',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label('Software') }}<br>
                                            @if ($serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','2',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label('Mechanic') }}<br>
                                            @if ($serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','3',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label('Electronic') }}<br>
                                            @if ($serviceOrder->type_service_id=='4')
                                            {{ Form::radio('type_service_id','4',true,array('disabled')) }}
                                            @else
                                            {{ Form::radio('type_service_id','4',false,array('disabled')) }}
                                            @endif
                                            {{ Form::label('Electric') }}<br>
                                            <!--{{ Form::select('type_service_id', $service, $serviceOrder->type_service_id, ['class' => 'form-control' . ($errors->has('type_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de servicio']) }}
                                            {!! $errors->first('type_service_id', '<div class="invalid-feedback">:message</div>') !!}-->
                                        </div>
                                    </td>
                                    <td style="width:50%">
                                        <br>
                                        <br>
                                        <br>
                                        @if($serviceOrder->status_order_id=='3')

                                        @else
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo4" >Edit</button>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <!----------------------->

                            
                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: left">
                                        <td><legend>Materials</legend></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: center; width:15%">
                                        @if($serviceOrder->status_order_id=='3')    
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1" hidden>Add material</button>
                                        @else
                                            @method('GET')
                                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo1">Add material</button>
                                        @endif    
                                        
                                        </td>
                                    </tr>                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
                                        <th style="width:15%">Name</th>
										<th style="width:15%">Key</th>
										<th style="width:15%">Quantity</th>
                                        <th style="width:15%">Stock</th>
										<th style="width:15%">Unit of measure</th>
										

                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($materialAssigneds as $materialAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
                                            <td style="width:15%">{{ $materialAssigned->material->name }}</td>
											<td style="width:15%">{{ $materialAssigned->material->key }}</td>
											<td style="width:15%">{{ $materialAssigned->quantity }}</td>
                                            <td style="width:15%">{{ $materialAssigned->material->stock }}</td>
											<td style="width:15%">{{ $materialAssigned->material->unit_measure }}</td>
											

                                            <td style="width:10%">
                                                @if($serviceOrder->status_order_id=='3')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')" hidden><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                @else    
                                                    <form action="{{ route('material-assigneds.destroy',$materialAssigned->material_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('material-assigneds.show',$materialAssigned->material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-outline-success"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                        @method('GET')
                                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" href="{{ route('material-assigneds.edit',$materialAssigned->material_id) }}" hidden>Edit</button>
                                                        
                                                        @method('GET')
                                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#dialogo6" href="{{ route('material-assigneds.edit',$materialAssigned->material_id) }}">Edit</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete material?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">      
                                    <tr style="text-align: left">
                                        <td><legend>Tools</legend></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: center; width:15%">
                                            @if($serviceOrder->status_order_id=='3')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo2" hidden>Add tool</button>
                                            @else
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo2">Add tool</button>
                                            @endif
                                            
                                        </td>
                                    </tr>                          
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th style="width:15%">Name</th>
                                        <th style="width:15%">Key</th>
										<th style="width:15%">Quantity</th>
                                        <th style="width:15%">Stock</th>
										<th style="width:15%">Unit of measure</th>

                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($toolAssigneds as $toolAssigned)
                                        
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>

                                            <td style="width:15%">{{ $toolAssigned->tool->name }}</td>
											<td style="width:15%">{{ $toolAssigned->tool->key }}</td>
											<td style="width:15%">{{ $toolAssigned->quantity }}</td>
											<td style="width:15%">{{ $toolAssigned->tool->stock }}</td>
											<td style="width:15%">{{ $toolAssigned->tool->unit_measure }}</td>

                                            <td style="width:10%">
                                                @if($serviceOrder->status_order_id=='3')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')" hidden><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                @else
                                                    <form action="{{ route('tool-assigneds.destroy',$toolAssigned->tool_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('tool-assigneds.show',$toolAssigned->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                        <a class="btn btn-outline-success" ><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr style="text-align: left">
                                        <td><legend>Employees</legend></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align: center; width:15%">
                                            @if($serviceOrder->status_order_id=='3')
                                                
                                            @else
                                                @method('GET')
                                                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dialogo3">Add employee</button>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="text-align: center">
                                        <th style="width:20%">No</th>
                                        
                                        <th style="width:20%">Order</th>
                                        <th style="width:20%">Employee</th>
                                        <th style="width:20%">Department</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeOrders as $employeeOrder)
                                    
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td style="width:20%">{{ $employeeOrder->employee->employee_id }}</td>
                                            
                                            <td style="width:20%">{{ $employeeOrder->service_order_id }}</td>
                                            <td style="width:20%">{{ $employeeOrder->employee->name }}</td>
                                            <td style="width:20%">{{ $employeeOrder->employee_id }}</td>
                                           
                                            <td style="width:10%">
                                                @if($serviceOrder->status_order_id=='3')
                                                
                                                @else
                                                    <form action="{{ route('employee-orders.destroy',$employeeOrder->employee_id) }}" method="POST">
                                                        <!--<a class="btn btn-outline-primary" href="{{ route('employee-orders.show',$employeeOrder->employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>-->
                                                        <a class="btn btn-outline-success" ><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete employee?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                        <!---->
                    </div>
                </div>
                {!! $serviceOrders->links() !!}
            </div>
        </div>
    </div>
@endsection
