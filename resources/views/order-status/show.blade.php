@extends('layouts.app')

@section('template_title')
    {{ $orderStatus->name ?? 'Show Order Status' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Status: "{{ $orderStatus->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('order-statuses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Status order id:</strong>
                            {{ $orderStatus->status_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $orderStatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $orderStatus->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date registration:</strong>
                            {{ $orderStatus->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
