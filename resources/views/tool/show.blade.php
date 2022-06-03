@extends('layouts.app')

@section('template_title')
    {{ $tool->name ?? 'Show Tool' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tool</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tools.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tool Id:</strong>
                            {{ $tool->tool_id }}
                        </div>
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $tool->key }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $tool->name }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Measure:</strong>
                            {{ $tool->unit_measure }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $tool->stock }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $tool->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $tool->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
