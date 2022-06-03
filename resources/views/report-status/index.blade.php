@extends('layouts.app')

@section('template_title')
    Report Status
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Status report') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('report-statuses.create') }}" class="btn btn-primary"  data-placement="left">
                                  {{ __('New status') }}
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
                                        
										<th>Name</th>
                                        <th>Actions</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportStatuses as $reportStatus)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reportStatus->name }}</td>

                                            <td>
                                                <form action="{{ route('report-statuses.destroy',$reportStatus->status_report_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary " href="{{ route('report-statuses.show',$reportStatus->status_report_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('report-statuses.edit',$reportStatus->status_report_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete status?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reportStatuses->links() !!}
            </div>
        </div>
    </div>
@endsection
