@extends('layouts.app')

@section('template_title')
    {{ $ticketStatus->name ?? 'Show Ticket Status' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Status: "{{ $ticketStatus->name }}"</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ticket-statuses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ticket status Id:</strong>
                            {{ $ticketStatus->status_ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $ticketStatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $ticketStatus->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $ticketStatus->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
