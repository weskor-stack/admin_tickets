@extends('layouts.app')

@section('template_title')
    {{ $status->name ?? 'Show Status' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos del estado "{{ $status->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('statuses.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $status->status_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $status->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $status->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de registro:</strong>
                            {{ $status->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
