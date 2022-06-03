@extends('layouts.app')

@section('template_title')
    Customer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Customer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Customer Id</th>
										<th>Key</th>
										<th>Name</th>
										<th>Address</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status Id</th>
										<th>User Id</th>
										<th>Date Registration</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $customer->customer_id }}</td>
											<td>{{ $customer->key }}</td>
											<td>{{ $customer->name }}</td>
											<td>{{ $customer->address }}</td>
											<td>{{ $customer->email }}</td>
											<td>{{ $customer->phone }}</td>
											<td>{{ $customer->status_id }}</td>
											<td>{{ $customer->user_id }}</td>
											<td>{{ $customer->date_registration }}</td>

                                            <td>
                                                <form action="{{ route('customers.destroy',$customer->customer_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('customers.show',$customer->customer_id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('customers.edit',$customer->customer_id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $customers->links() !!}
            </div>
        </div>
    </div>
@endsection
