@extends('layouts.app')

@section('template_title')
    {{ $serviceOrder->name ?? 'Show Service Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Service order</span>
                        </div>
                        <div class="float-right">
                            <br>
                            <a class="btn btn-primary" href="{{ route('service-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Order:</strong>
                            {{ $serviceOrder->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date order:</strong>
                            {{ $serviceOrder->date_order }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket:</strong>
                            {{ $serviceOrder->ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type of maintenance:</strong>
                            {{ $serviceOrder->typemaintenance->name }}
                        </div>
                        <div class="form-group">
                            <strong>Type of service:</strong>
                            {{ $serviceOrder->typeservice->name }}
                        </div>
                        <div class="form-group">
                            <strong>Order status:</strong>
                            {{ $serviceOrder->orderstatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $serviceOrder->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date registration:</strong>
                            {{ $serviceOrder->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
