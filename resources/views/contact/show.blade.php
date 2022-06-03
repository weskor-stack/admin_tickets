@extends('layouts.app')

@section('template_title')
    {{ $contact->name ?? 'Show Contact' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Contact: "{{ $contact->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Contact:</strong>
                            {{ $contact->contact_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $contact->name }}
                        </div>
                        <div class="form-group">
                            <strong>Last name:</strong>
                            {{ $contact->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>E-mail:</strong>
                            {{ $contact->email }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $contact->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Customer:</strong>
                            {{ $contact->customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $contact->status->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $contact->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date registration:</strong>
                            {{ $contact->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
