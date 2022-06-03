@extends('layouts.app')

@section('template_title')
    Service
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
                                        
										<th>Service's Date</th>
										<th>Status Report</th>
										<th>Service Order</th>
                                        <th>Type service</th>
                                        <th>Customer</th>
										<th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $service->date_service }}</td>
											<td>{{ $service->reportStatus->name }}</td>
                                            <td>{{ $service->serviceOrder->service_order_id }}</td>
											<td>{{ $service->serviceOrder->typeService->name }}</td>
                                            <td>{{ $service->serviceOrder->ticket->customer->name }}</td>

                                            <td>
                                                <form action="{{ route('services.destroy',$service->service_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('service-reports.index','id_service='.$service->service_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <!--<a class="btn btn-outline-success" href="{{ route('services.edit',$service->service_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>-->
                                                    @if($service->reportStatus->name=='Inicializado')
                                                    <a href="{{ route('activities.create','id='.$service->service_id) }}" class="btn btn-outline-dark"  data-placement="left" hidden>{{ __('Sign report') }}</a>
                                                    @endif
                                                    
                                                    @if($service->reportStatus->name=='Finalizado')
                                                    <a href="{{ route('service-reports.create','id='.$service->service_id) }}" class="btn btn-outline-warning" data-placement="left" hidden>{{ __('Add Service') }}</a>
                                                    
                                                    <a href="{{ route('activities.create','id='.$service->service_id) }}" class="btn btn-outline-dark"  data-placement="left" hidden>{{ __('Sign report') }}</a>
                                                    @else
                                                    <a href="{{ route('service-reports.create','id='.$service->service_id) }}" class="btn btn-outline-warning" data-placement="left">{{ __('Add Service') }}</a>
                                                    
                                                    @endif
                                                    
                                                    @if($service->reportStatus->name=='En proceso')
                                                    <a href="{{ route('activities.create','id='.$service->service_id) }}" class="btn btn-outline-dark"  data-placement="left">{{ __('Sign report') }}</a>
                                                    @endif

                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
