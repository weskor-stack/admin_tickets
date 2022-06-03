@extends('layouts.app')

@section('template_title')
    {{ $reportStatus->name ?? 'Show Report Status' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Status: "{{ $reportStatus->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('report-statuses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Status report id:</strong>
                            {{ $reportStatus->status_report_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $reportStatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $reportStatus->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $reportStatus->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
