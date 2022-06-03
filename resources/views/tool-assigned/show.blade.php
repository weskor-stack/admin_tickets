@extends('layouts.app')

@section('template_title')
    {{ $toolAssigned->name ?? 'Show Tool Assigned' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Herramienta asignada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tool Id:</strong>
                            {{ $toolAssigned->tool_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $toolAssigned->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Measure:</strong>
                            {{ $toolAssigned->unit_measure }}
                        </div>
                        <div class="form-group">
                            <strong>Usage:</strong>
                            {{ $toolAssigned->usage }}
                        </div>
                        <div class="form-group">
                            <strong>Service Order Id:</strong>
                            {{ $toolAssigned->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $toolAssigned->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $toolAssigned->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
