@extends('layouts.app')

@section('template_title')
    {{ $employeeOrder->name ?? 'Show Employee Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Service Order Id:</strong>
                            {{ $employeeOrder->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $employeeOrder->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employeeOrder->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $employeeOrder->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
