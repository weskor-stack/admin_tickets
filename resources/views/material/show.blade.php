@extends('layouts.app')

@section('template_title')
    {{ $material->name ?? 'Show Material' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Material</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Material Id:</strong>
                            {{ $material->material_id }}
                        </div>
                        <div class="form-group">
                            <strong>Key:</strong>
                            {{ $material->key }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $material->name }}
                        </div>
                        <div class="form-group">
                            <strong>Unit Measure:</strong>
                            {{ $material->unit_measure }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $material->stock }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $material->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $material->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
