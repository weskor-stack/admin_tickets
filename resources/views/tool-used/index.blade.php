@extends('layouts.app')

@section('template_title')
    Tool Used
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tool Used') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tool-useds.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tool Used Id</th>
										<th>Tool Id</th>
										<th>Quantity</th>
										<th>Service Id</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($toolUseds as $toolUsed)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $toolUsed->tool_used_id }}</td>
											<td>{{ $toolUsed->tool_id }}</td>
											<td>{{ $toolUsed->quantity }}</td>
											<td>{{ $toolUsed->service_id }}</td>
											<td>{{ $toolUsed->user_id }}</td>
											<td>{{ $toolUsed->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('tool-useds.destroy',$toolUsed->tool_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tool-useds.show',$toolUsed->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tool-useds.edit',$toolUsed->tool_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $toolUseds->links() !!}
            </div>
        </div>
    </div>
@endsection
