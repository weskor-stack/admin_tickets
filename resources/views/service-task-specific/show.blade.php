@extends('layouts.app')

@section('template_title')
    {{ $serviceTaskSpecific->name ?? 'Show Service Task Specific' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Service Task Specific</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service-task-specifics.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Service Id:</strong>
                            {{ $serviceTaskSpecific->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Description Task:</strong>
                            {{ $serviceTaskSpecific->description_task }}
                        </div>
                        <div class="form-group">
                            <strong>Previous Evidence:</strong>
                            {{ $serviceTaskSpecific->previous_evidence }}
                        </div>
                        <div class="form-group">
                            <strong>Subsequent Evidence:</strong>
                            {{ $serviceTaskSpecific->subsequent_evidence }}
                        </div>
                        <div class="form-group">
                            <strong>Signature Evidence:</strong>
                            {{ $serviceTaskSpecific->signature_evidence }}
                        </div>
                        <div class="form-group">
                            <strong>Contact Id:</strong>
                            {{ $serviceTaskSpecific->contact_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $serviceTaskSpecific->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $serviceTaskSpecific->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $serviceTaskSpecific->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
