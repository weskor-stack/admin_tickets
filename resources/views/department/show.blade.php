@extends('layouts.app')

@section('template_title')
    {{ $department->name ?? 'Show Department' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Department "{{ $department->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $department->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departament:</strong>
                            {{ $department->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $department->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date registration:</strong>
                            {{ $department->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
