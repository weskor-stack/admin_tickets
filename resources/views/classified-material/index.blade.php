@extends('layouts.app')

@section('template_title')
    Classified Material
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Classified Material') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('classified-materials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Classified Material Id</th>
										<th>Name</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classifiedMaterials as $classifiedMaterial)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $classifiedMaterial->classified_material_id }}</td>
											<td>{{ $classifiedMaterial->name }}</td>
											<td>{{ $classifiedMaterial->user_id }}</td>
											<td>{{ $classifiedMaterial->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('classified-materials.destroy',$classifiedMaterial->classified_material_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('classified-materials.show',$classifiedMaterial->classified_material_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('classified-materials.edit',$classifiedMaterial->classified_material_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $classifiedMaterials->links() !!}
            </div>
        </div>
    </div>
@endsection
