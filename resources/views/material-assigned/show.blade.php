@extends('layouts.app')

@section('template_title')
    {{ $materialAssigned->name ?? 'Show Material Assigned' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Material Assigned</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $materialAssigned->material->key }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $materialAssigned->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Unit mesure:</strong>
                            {{ $materialAssigned->unit_measure }}
                        </div>
                        <div class="form-group">
                            <strong>Usage:</strong>
                            {{ $materialAssigned->usage }}
                        </div>
                        <div class="form-group">
                            <strong>Service Order:</strong>
                            {{ $materialAssigned->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $materialAssigned->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date registration:</strong>
                            {{ $materialAssigned->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
