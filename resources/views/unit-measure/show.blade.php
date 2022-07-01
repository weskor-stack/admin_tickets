@extends('layouts.app')

@section('template_title')
    {{ $unitMeasure->name ?? 'Show Unit Measure' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Unit Measure</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unit-measures.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Unit Measure Id:</strong>
                            {{ $unitMeasure->unit_measure_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $unitMeasure->name }}
                        </div>
                        <div class="form-group">
                            <strong>Abbreviation:</strong>
                            {{ $unitMeasure->abbreviation }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $unitMeasure->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $unitMeasure->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
