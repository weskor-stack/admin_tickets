@extends('layouts.app')

@section('template_title')
    Priority
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Priority') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('priorities.create') }}" class="btn btn-primary"  data-placement="left">
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
                                        
										<th>Priority Id</th>
										<th>Name</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priorities as $priority)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $priority->priority_id }}</td>
											<td>{{ $priority->name }}</td>
											<td>{{ $priority->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('priorities.destroy',$priority->priority_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary" href="{{ route('priorities.show',$priority->priority_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('priorities.edit',$priority->priority_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete priority?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $priorities->links() !!}
            </div>
        </div>
    </div>
@endsection
