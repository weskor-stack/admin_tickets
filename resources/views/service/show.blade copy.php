@extends('layouts.app')

@section('template_title')
    {{ $service->name ?? 'Show Service' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $service->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Service:</strong>
                            {{ $service->date_service }}
                        </div>
                        <div class="form-group">
                            <strong>Status Report Id:</strong>
                            {{ $service->status_report_id }}
                        </div>
                        <div class="form-group">
                            <strong>Service Order Id:</strong>
                            {{ $service->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Priority Id:</strong>
                            {{ $service->priority_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $service->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $service->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
