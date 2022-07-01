@extends('layouts.app')

@section('template_title')
    Service Task Specific
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Service Task Specific') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('service-task-specifics.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Service Id</th>
										<th>Description Task</th>
										<th>Previous Evidence</th>
										<th>Subsequent Evidence</th>
										<th>Signature Evidence</th>
										<th>Contact Id</th>
										<th>Employee Id</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceTaskSpecifics as $serviceTaskSpecific)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $serviceTaskSpecific->service_id }}</td>
											<td>{{ $serviceTaskSpecific->description_task }}</td>
											<td>{{ $serviceTaskSpecific->previous_evidence }}</td>
											<td>{{ $serviceTaskSpecific->subsequent_evidence }}</td>
											<td>{{ $serviceTaskSpecific->signature_evidence }}</td>
											<td>{{ $serviceTaskSpecific->contact_id }}</td>
											<td>{{ $serviceTaskSpecific->employee_id }}</td>
											<td>{{ $serviceTaskSpecific->user_id }}</td>
											<td>{{ $serviceTaskSpecific->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('service-task-specifics.destroy',$serviceTaskSpecific->service_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('service-task-specifics.show',$serviceTaskSpecific->service_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('service-task-specifics.edit',$serviceTaskSpecific->service_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $serviceTaskSpecifics->links() !!}
            </div>
        </div>
    </div>
@endsection
