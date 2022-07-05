@extends('layouts.app')

@section('template_title')
    {{ $materialUsed->name ?? 'Show Material Used' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Material Used</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('material-useds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Material Used Id:</strong>
                            {{ $materialUsed->material_used_id }}
                        </div>
                        <div class="form-group">
                            <strong>Material Id:</strong>
                            {{ $materialUsed->material_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $materialUsed->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $materialUsed->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $materialUsed->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $materialUsed->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
