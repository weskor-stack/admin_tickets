@extends('layouts.app')

@section('template_title')
    {{ $typeService->name ?? 'Show Type Service' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Type service: {{ $typeService->name }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-services.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Type service Id:</strong>
                            {{ $typeService->type_service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Service:</strong>
                            {{ $typeService->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $typeService->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $typeService->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
