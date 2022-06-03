@extends('layouts.app')

@section('template_title')
    Supervisor Employee
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Supervisor Employee') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('supervisor-employees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Supervisor Employee</th>
										<th>Employee</th>
										<th>Department</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supervisorEmployees as $supervisorEmployee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $supervisorEmployee->employee2->name }} {{ $supervisorEmployee->employee2->last_name }}</td>
                                            <td>{{ $supervisorEmployee->employee->name }} {{ $supervisorEmployee->employee->last_name }}</td>
											<td>{{ $supervisorEmployee->department->name }}</td>
											

                                            <td>
                                                <form action="{{ route('supervisor-employees.destroy',$supervisorEmployee->supervisor_employee_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('supervisor-employees.show',$supervisorEmployee->supervisor_employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('supervisor-employees.edit',$supervisorEmployee->supervisor_employee_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $supervisorEmployees->links() !!}
            </div>
        </div>
    </div>
@endsection
