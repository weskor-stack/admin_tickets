@extends('layouts.app')

@section('template_title')
    {{ $priority->name ?? 'Show Priority' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Priority</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('priorities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Priority Id:</strong>
                            {{ $priority->priority_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $priority->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $priority->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $priority->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
