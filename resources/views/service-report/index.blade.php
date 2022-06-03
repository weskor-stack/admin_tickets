@extends('layouts.app')

@section('template_title')
    Service Report
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Reports') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg"  data-placement="left">
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
                        <br>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            @foreach ($serviceReports as $serviceReport)
                                <!--<td>{{ $serviceReport->service->serviceOrder->typeMaintenance->name}}</td>-->
                            @endforeach

                            <table class="table table-striped table-hover">
                                
                                <tr style="text-align: center">
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
										<th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports2 as $serviceReport)
                                        
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
                                                <form action="{{ route('service-reports.destroy',$serviceReport->service_report_id) }}" method="POST">
                                                    <a class="btn btn-sm btn btn-outline-primary" href="{{ route('service-reports.show',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-outline-success" href="{{ route('service-reports.edit',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Do you want to delete service?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                    
                                @if ($reports2->isEmpty())
                                    <p></p>
                                @else
                                    <legend>Maintenance types</legend>
                                        <!--<p>{{ $serviceReport->service->serviceOrder->typeMaintenance->name}}</p>-->
                                        
                                        @if ($serviceReport->service->serviceOrder->type_maintenance_id=='1')
                                            {{ Form::radio('type_maintenance_id','1',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_maintenance_id','1',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Preventivo') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_maintenance_id=='2')
                                            {{ Form::radio('type_maintenance_id','2',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_maintenance_id','2',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Correctivo') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_maintenance_id=='3')
                                            {{ Form::radio('type_maintenance_id','3',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_maintenance_id','3',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Predictivo') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_maintenance_id=='4')
                                            {{ Form::radio('type_maintenance_id','4',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_maintenance_id','4',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Incluido') }}<br>
                                    <br>
                                    <legend>Service types</legend>
                                        <!--<p>{{ $serviceReport->service->serviceOrder->typeService->name}}</p>-->
                                        @if ($serviceReport->service->serviceOrder->type_service_id=='0')
                                            {{ Form::label('No Data') }}<br>
                                        @endif
                                        @if ($serviceReport->service->serviceOrder->type_service_id=='1')
                                            {{ Form::radio('type_service_id','1',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','1',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Software') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_service_id=='2')
                                            {{ Form::radio('type_service_id','2',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','2',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Mecánico') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_service_id=='3')
                                            {{ Form::radio('type_service_id','3',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','3',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Electrónico') }}<br>
                                        @if ($serviceReport->service->serviceOrder->type_service_id=='4')
                                            {{ Form::radio('type_service_id','4',true,array('disabled')) }}
                                        @else
                                            {{ Form::radio('type_service_id','4',false,array('disabled')) }}
                                        @endif
                                            {{ Form::label('Eléctrico') }}<br>
                                @endif
                            </table>
                            <legend>Materials</legend>
                            <table class="table table-striped table-hover">
                                <thead class="thead">                                
                                    <tr style="text-align: center">
                                        <th hidden>No</th>
                                        
										<th>Key</th>
										<th>Quantity</th>
										<th>Unit of measure</th>
										<th>Usage</th>

                                        <th></th>
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

                                        <th></th>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($dataActivity as $activity)

                            <div>
                            <legend>Evidence</legend>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                
                                <table class=table align="center">
                                    <tr>
                                        <td align="center">
                                            <h5>Before:</h5>

                                            <div class="form-group">
                                                <img src="{{ asset('storage').'/'.$activity->previous_evidence }}" width="300" height="300" alt="">  
                                            </div>
                                        </td>
                                        <td align="center">
                                            <h5>After:</h5>
                                            <div class="form-group">
                                                <img src="{{ asset('storage').'/'.$activity->subsequent_evidence }}" width="300" height="300" alt=""> 
                                            </div>
                                        </td>
                                        <br>
                                    </tr>
                                </table>
                                <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
                            </div>
                            <div class="form-group">
                                <legend>Description Activity:</legend>
                                {{ $activity->description_activity }}
                            </div>
                            <div class="form-group">
                                <legend>Signature Evidence:</legend>
                                <img src="{{  $activity->signature_evidence }}" width="100%" height="300" alt="">
                                
                                <div>
                                    <table class="table table-striped table-hover">
                                        <tr style="text-align: center">
                                            <td><legend>Employee:</legend></td>
                                            <td><legend>Client:</legend></td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <td>
                                                <select class="form-control form-control-lg">
                                                    @foreach ($employeeOrders as $employeeOrder)
                                                    <option>{{ $employeeOrder->employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $activity->service->serviceOrder->ticket->contact->name }}" style="text-align: center" disabled>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <legend>User Id:</legend>
                                {{ $activity->user_id }}
                            </div>
                            <div class="form-group">
                                <legend>Date Registration:</legend>
                                {{ $activity->date_registration }}
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
                {!! $serviceReports->links() !!}
            </div>
        </div>
    </div>
@endsection
