@extends('layouts.app')

@section('template_title')
    {{ $serviceReport->name ?? 'Show Service Report' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Service Report</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service-reports.index','id='.$serviceReport->service_id) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Service Report Id:</strong>
                            {{ $serviceReport->service_report_id }}
                        </div>
                        <div class="form-group">
                            <strong>Time Entry:</strong>
                            {{ $serviceReport->time_entry }}
                        </div>
                        <div class="form-group">
                            <strong>Time Completion:</strong>
                            {{ $serviceReport->time_completion }}
                        </div>
                        <div class="form-group">
                            <strong>Lunchtime:</strong>
                            {{ $serviceReport->lunchtime }}
                        </div>
                        <div class="form-group">
                            <strong>Service Hours:</strong>
                            {{ $serviceReport->service_hours }}
                        </div>
                        <div class="form-group">
                            <strong>Service Extras:</strong>
                            {{ $serviceReport->service_extras }}
                        </div>
                        <div class="form-group">
                            <strong>Duration Travel:</strong>
                            {{ $serviceReport->duration_travel }}
                        </div>
                        <div class="form-group">
                            <strong>Date Service:</strong>
                            {{ $serviceReport->date_service }}
                        </div>
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $serviceReport->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $serviceReport->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $serviceReport->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $serviceReport->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
