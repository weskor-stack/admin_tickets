@extends('layouts.app')

@section('template_title')
    {{ $typeMaintenance->name ?? 'Show Type Maintenance' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Maintenance: "{{ $typeMaintenance->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-maintenances.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Type maintenance Id:</strong>
                            {{ $typeMaintenance->type_maintenance_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeMaintenance->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $typeMaintenance->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $typeMaintenance->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
