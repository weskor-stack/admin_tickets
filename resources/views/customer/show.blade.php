@extends('layouts.app')

@section('template_title')
    {{ $customer->name ?? 'Show Customer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Customer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Customer Id:</strong>
                            {{ $customer->customer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $customer->key }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $customer->address }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $customer->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $customer->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Status Id:</strong>
                            {{ $customer->status_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $customer->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $customer->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
