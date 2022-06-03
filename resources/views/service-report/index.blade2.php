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
                                {{ __('Reporte del servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('service-reports.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo reporte') }}
                                </a>
                                <a href="{{ route('activities.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Firmar actividad') }}
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
                                        <th hidden>No</th>
                                        
										<th>Reporte</th>
                                        
                                        <th>Cliente</th>
										<th>Fecha</th>
										<th>Prioridad</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceReports as $serviceReport)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td hidden>{{ ++$i }}</td>
                                            
                                            <td>{{ $serviceReport->service_report_id }}</td>
											<td>{{ $serviceReport->service->serviceOrder->ticket->customer->name }}</td>
											<td>{{ $serviceReport->date_service }}</td>
											<td>{{ $serviceReport->service->priority->name }}</td>
											<td>{{ $serviceReport->service->reportStatus->name }}</td>
											
                                            
                                            <td>
                                                <form action="{{ route('service-reports.destroy',$serviceReport->service_report_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('service-reports.show',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('service-reports.edit',$serviceReport->service_report_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviceReports->links() !!}
            </div>
        </div>
    </div>
@endsection
