@extends('layouts.app')

@section('template_title')
    Contact
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 30px; font-weight: bold;">

                            <span id="card_title">
                                {{ __('Lista de Contactos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo Contacto') }}
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
										<th>Last name</th>
										<th>E-mail</th>
										<th>Phone</th>
										<th>Customer</th>
										<th>Status</th>
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $contact->name }}</td>
											<td>{{ $contact->last_name }}</td>
											<td>{{ $contact->email }}</td>
											<td>{{ $contact->phone }}</td>
											<td>{{ $contact->customer->name }}</td>
											<td>{{ $contact->status->name }}</td>

                                            <td>
                                                <form action="{{ route('contacts.destroy',$contact->contact_id) }}" method="POST">
                                                    <a class="btn btn-outline-primary " href="{{ route('contacts.show',$contact->contact_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-outline-success" href="{{ route('contacts.edit',$contact->contact_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Do you want to delete contact?')"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $contacts->links() !!}
            </div>
        </div>
    </div>
@endsection
