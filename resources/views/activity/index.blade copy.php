@extends('layouts.app')

@section('template_title')
    Activity
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Actividad') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('activities.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva actividad') }}
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
                                        
                                        <th>Servicio</th>
										<th>Descripción de la actividad</th>
										<th>Evidencia previa al servicio</th>
										<th>Evidencia después del servicio</th>
										<th>Firma del Cliente</th>
										<th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $activity->service_id }}</td>
											<td>{{ $activity->description_activity }}</td>
											<td>
                                                <img src="{{ asset('storage').'/'.$activity->previous_evidence }}" width="100" height="100" alt="">
                                            </td>
											<td>
                                                <img src="{{ asset('storage').'/'.$activity->subsequent_evidence }}" width="100" height="100" alt="">
                                            </td>
											<td>
                                                <img src="{{  $activity->signature_evidence }}" width="300" height="100" alt="">    
                                            </td>

                                            <td>
                                                <form action="{{ route('activities.destroy',$activity->service_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('activities.show',$activity->service_id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('activities.edit',$activity->service_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quieres borrar?')><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $activities->links() !!}
            </div>
        </div>
    </div>
@endsection
