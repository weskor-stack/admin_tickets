@extends('layouts.app')

@section('template_title')
    {{ $toolUsed->name ?? 'Show Tool Used' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tool Used</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tool-useds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tool Used Id:</strong>
                            {{ $toolUsed->tool_used_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tool Id:</strong>
                            {{ $toolUsed->tool_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $toolUsed->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $toolUsed->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $toolUsed->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $toolUsed->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
