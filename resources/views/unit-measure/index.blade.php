@extends('layouts.app')

@section('template_title')
    Unit Measure
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Unit Measure') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('unit-measures.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Unit Measure Id</th>
										<th>Name</th>
										<th>Abbreviation</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unitMeasures as $unitMeasure)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $unitMeasure->unit_measure_id }}</td>
											<td>{{ $unitMeasure->name }}</td>
											<td>{{ $unitMeasure->abbreviation }}</td>
											<td>{{ $unitMeasure->user_id }}</td>
											<td>{{ $unitMeasure->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('unit-measures.destroy',$unitMeasure->unit_measure_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('unit-measures.show',$unitMeasure->unit_measure_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('unit-measures.edit',$unitMeasure->unit_measure_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $unitMeasures->links() !!}
            </div>
        </div>
    </div>
@endsection
