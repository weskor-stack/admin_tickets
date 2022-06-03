@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? 'Show Employee' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $employee->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $employee->name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $employee->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $employee->email }}
                        </div>
                        <div class="form-group">
                            <strong>Picture:</strong>
                            {{ $employee->picture }}
                        </div>
                        <div class="form-group">
                            <strong>Status Id:</strong>
                            {{ $employee->status_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employee->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $employee->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
