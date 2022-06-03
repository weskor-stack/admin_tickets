@extends('layouts.app')

@section('template_title')
    Tool
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Tools') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tools.create') }}" class="btn btn-primary"  data-placement="left">
                                  {{ __('New tool') }}
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
                                        
										<th>Key</th>
										<th>Name</th>
										<th>Unit measure</th>
										<th>Stock</th>
										<th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tools as $tool)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tool->key }}</td>
											<td>{{ $tool->name }}</td>
											<td>{{ $tool->unit_measure }}</td>
											<td>{{ $tool->stock }}</td>

                                            <td>
                                                <form action="{{ route('tools.destroy',$tool->tool_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary " href="{{ route('tools.show',$tool->tool_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('tools.edit',$tool->tool_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete tool?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tools->links() !!}
            </div>
        </div>
    </div>
@endsection
