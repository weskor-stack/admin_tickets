@extends('layouts.app')

@section('template_title')
    {{ $supervisorEmployee->name ?? 'Show Supervisor Employee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Supervisor Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('supervisor-employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Supervisor Employee Employee Id:</strong>
                            {{ $supervisorEmployee->supervisor_employee_employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Department Department Id:</strong>
                            {{ $supervisorEmployee->department_department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Employee Id:</strong>
                            {{ $supervisorEmployee->employee_employee_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
