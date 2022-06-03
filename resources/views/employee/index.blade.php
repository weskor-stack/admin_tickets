@extends('layouts.app')

@section('template_title')
    Employee
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('employees') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employees.create') }}" class="btn btn-primary"  data-placement="left">
                                  {{ __('New employee') }}
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
                                        <th style="text-align: center">No</th>
                                        
                                        <th style="text-align: center">Picture</th>
										<th style="text-align: center">Name</th>
										<th style="text-align: center">Last name</th>
										<th style="text-align: center">E-mail</th>										
										<th style="text-align: center">Department</th>
										<th style="text-align: center">Status</th>
                                        <th style="text-align: center">Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr style="font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td style="text-align: center">{{ $employee->employee_id }}</td>
                                            
                                            <td style="text-align: center">
                                                <img src="{{ asset('app/public').'/'.$employee->picture }}" width="100" height="100" alt="">
                                            </td>
											<td style="text-align: center">{{ $employee->name }}</td>
											<td style="text-align: center">{{ $employee->last_name }}</td>
											<td style="text-align: center">{{ $employee->email }}</td>
											<td style="text-align: center"></td>
											<td style="text-align: center">{{ $employee->status->name }}</td>

                                            <td style="text-align: center">
                                                <form action="{{ route('employees.destroy',$employee->employee_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('employees.show',$employee->employee_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('employees.edit',$employee->employee_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection
